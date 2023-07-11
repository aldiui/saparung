$(document).ready(function () {
	$("#basic-datatables").DataTable({
		dom: "Blfrtip",
		lengthMenu: [
			[10, 25, 50, 10000],
			["10", "25", "50", "Show All"],
		],
		buttons: ["copy", "csv", "excel", "pdf", "print"],
	});
	$("#basic").DataTable({
		lengthMenu: [
			[10, 25, 50, 10000],
			["10", "25", "50", "Show All"],
		],
	});

	$("#dp").select2({
		theme: "bootstrap4",
		width: $(this).data("width")
			? $(this).data("width")
			: $(this).hasClass("w-100")
			? "100%"
			: "style",
		allowClear: true,
	});

	$("#agama").select2({
		theme: "bootstrap4",
		width: $(this).data("width")
			? $(this).data("width")
			: $(this).hasClass("w-100")
			? "100%"
			: "style",
		allowClear: true,
	});

	$("#pendidikan").select2({
		theme: "bootstrap4",
		width: $(this).data("width")
			? $(this).data("width")
			: $(this).hasClass("w-100")
			? "100%"
			: "style",
		allowClear: true,
	});

	$("#status").select2({
		theme: "bootstrap4",
		width: $(this).data("width")
			? $(this).data("width")
			: $(this).hasClass("w-100")
			? "100%"
			: "style",
		allowClear: true,
	});
});
