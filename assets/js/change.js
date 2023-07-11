$(".form-check-input").on("click", function () {
	const menuId = $(this).data("menu");
	const roleId = $(this).data("role");

	$.ajax({
		url: baseUrl + "admin/changeaccess",
		type: "post",
		data: {
			menuId: menuId,
			roleId: roleId,
		},
		success: function () {
			document.location.href = baseUrl + "admin/roleaccess/" + roleId;
		},
	});
});