$(document).ready(() => {
	var base_url = window.location.origin;
	var userTable;

	$("#btn-show").click(function() {
		$("#create").modal("show");
		// $("table").load(base_url + "/user .tbody");
		// userTable.reload();
	});

	userTable = $("#userTable").DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: "user/datatables/get",
			dataType: "json",
			// data: {_token : $('meta[name="token_"]').attr('content')},
			type: "POST"
		},

		lengthMenu: [10, 25, 50, 75, 100, 250, 500],
		rowReorder: {
			selector: ".sort-column",
			update: false
		},
		columns: [
			{
				data: "id",
				orderable: true,
				searchable: true,
				visible: true
			},

			{
				data: "firstname",
				render: function(data, type, row, meta) {
					return textTruncate(type, data, 20);
				}
			},
			{
				data: "lastname",
				render: function(data, type, row, meta) {
					return textTruncate(type, data, 20);
				}
			},
			{
				data: "email",
				render: function(data, type, row, meta) {
					return textTruncate(type, data, 20);
				}
			},
			{
				data: "id",
				className: "v-align",
				searchable: false,
				orderable: false,
				render: function(data, type, row, meta) {
					/**
					 * Attach actions
					 */
					//   return "<div class=\"btn-group\" role=\"group\" aria-label=\"actions\">" +
					//           "<button class='btn btn-xs btn-primary viewBtn' type='button' title='View' data-toggle='modal' data-target='#viewCategoryModal' value='"+data+"'><span class='fa fa-eye'></span></button> " +
					//           "<button class='btn btn-xs btn-success editBtn' type='button' title='Edit' data-toggle='modal' data-target='#editCategoryModal' value='"+data+"'><span class='fa fa-pencil'></span></button>" +
					//           "<button class='btn btn-xs btn-danger delBtn' type='button' title='Delete' data-toggle='modal' data-target='#deleteCategoryModal' value='"+data+"'><span class='fa fa-trash'></span></button>" +
					//           "</div>";
					return (
						"<button data-toggle='modal' data-id='" +
						data +
						"' class='btn btn-danger btn-xs delUserInfo'> Remove</button>" +
						"<button type='button' data-toggle='modal' data-id='" +
						data +
						"' class='btn  btn-xs btn-primary editUserInfo' id='editmodal'>Edit</button>"
					);

					("Edit");
					("</button>");
				}
			}
		],
		drawCallback: function() {
			$(".delUserInfo").click(function() {
				var id = $(this).data("id");
				$.post(base_url + "/user/getUser", { id: id }).done(function(result) {
					var jsonResult = JSON.parse(result);
					$("#delEmail").text(jsonResult.email);
					$("#delId").val(jsonResult.id);
					$("#removeModal").modal("show");
				});
			});
			$(".editUserInfo").click(function() {
				var id = $(this).data("id");
				$.post(base_url + "/user/getUser", { id: id }).done(function(result) {
					var jsonResult = JSON.parse(result);
					$("#userid").val(jsonResult.id);
					$("#fname").val(jsonResult.firstname);
					$("#lname").val(jsonResult.lastname);
					$("#email").val(jsonResult.email);
					$("#editModal").modal("show");
				});
			});
		},
		order: []
	});

	function textTruncate(type, data, length) {
		if (data.length) {
			return data;
		}

		return type === "display" && data.length > length
			? '<span class="cursor-pointer truncated-text" data-text="' +
					data +
					'">' +
					data.substr(0, length - 2) +
					"...</span>"
			: data;
		// DO NOT DELETE WILL BE USED LATER ON...
		/*return type === 'display' && data.length > length ? '<span ' + ((isLink) ? 'class="cursor-pointer truncated-text"' : "") + ' data-text="'+data+'">'+data.substr( 0, length - 2 )+'...</span>' : data;*/
	}
	$(".getUserInfo").on("click", "#userTable  tbody tr", function() {
		$("#editModal").modal("show");
	});

	$("#btn-add").on("click", () => {
		var form = $("#create #frm")[0];
		var formData = new FormData(form);

		$.ajax({
			url: "/add",
			data: formData,
			type: "POST",
			dataType: "json",
			processData: false,
			contentType: false,
			success: function(result) {
				//console.log(result);
				$("#create").modal("hide");
				Swal.fire("Good job!", "You clicked the button!", "success");
				userTable.ajax.reload();
			}
		});
		// var form = $("#frm").serialize();
		// $.ajax(
		// 	$.post(base_url + "/add", form)
		// 		.done(function(result) {
		// 			$("#frm")[0].reset();
		// 			$("#create").modal("hide");
		// 			$("#success-message").html(
		// 				'<div class="alert alert-dismissible alert-success">' +
		// 					'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
		// 					"<strong>" +
		// 					result.message +
		// 					"</div>"
		// 			);
		// 			// viewData().cle;
		// 		})
		// 		.fail(function(result) {
		// 			console.log(result.responseJSON.message);
		// 			$(".create-modal #error-message").html(result.responseJSON.message);
		// 			// $(".create-modal #error-message").html("test");
		// 		})
		// );
	});

	$("#btn-update").on("click", e => {
		e.preventDefault();

		let frm = $("#editfrm").serialize();

		$.post(base_url + "/user/update", frm)
			.done(function(result) {
				$("#frm")[0].reset();
				$("#editModal").modal("hide");
				$("#success-message").html(
					'<div class="alert alert-dismissible alert-success">' +
						'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
						"<strong>" +
						result.message +
						"</div>"
				);
				// $("table").load(base_url + "/user .myTable");
				userTable.ajax.reload();
			})
			.fail(function(result) {
				$(".update-error").html(
					'<div class="alert alert-dismissible alert-danger">' +
						'<button type="button" class="close" data-dismiss="alert">&times;</button>' +
						result.responseJSON.message +
						"</div>"
				);
				userTable.ajax.reload();
			});
	});

	$("#btn-remove").click(function() {
		var frm = $("#delfrm").serialize();
		$.ajax(
			$.post(base_url + "/user/remove", frm).done(function() {
				$("#removeModal").modal("hide");
				userTable.ajax.reload();
			})
		);
	});

	$("#customCheck1").change(function() {
		if (this.checked) $(".changePassword").fadeIn("slow");
		else $(".changePassword").fadeOut("slow");
	});
});

let viewData = function() {
	var base_url = window.location.origin;

	$.post(base_url + "/user").done(function(result) {
		$("tbody").html(result);
	});
};
