var pieChart = document.getElementById("statistikSurat").getContext("2d");
var myPieChart = new Chart(pieChart, {
	type: "doughnut",
	data: {
		datasets: [
			{
				data: [suratMasuk, suratKeluar],
				backgroundColor: ["#716aca", "#f3545d"],
				borderWidth: 0,
			},
		],
		labels: ["Surat Masuk", "Surat Keluar"],
	},
	options: {
		responsive: true,
		maintainAspectRatio: false,
		legend: {
			position: "bottom",
		},
		layout: {
			padding: {
				left: 20,
				right: 20,
				top: 20,
				bottom: 20,
			},
		},
	},
});

var multipleBarChart2 = document
	.getElementById("statistikPenduduk")
	.getContext("2d");
var myMultipleBarChart2 = new Chart(multipleBarChart2, {
	type: "bar",
	data: {
		labels: ["Laki-laki", "Perempuan", "Total Populasi"],
		datasets: [
			{
				label: "Laki-laki",
				backgroundColor: "#ffa534",
				borderColor: "#ffa534",
				data: [lakiLaki, 0, 0],
			},
			{
				label: "Perempuan",
				backgroundColor: "#177dff",
				borderColor: "#177dff",
				data: [0, perempuan, 0],
			},
			{
				label: "Total Populasi",
				backgroundColor: "#35cd3a",
				borderColor: "#35cd3a",
				data: [0, 0, dataPenduduk],
			},
		],
	},
	options: {
		responsive: true,
		maintainAspectRatio: false,
		legend: {
			position: "bottom",
		},
		title: {
			display: true,
			text: "Statistik Penduduk Desa Parung ",
		},
		responsive: true,
		scales: {
			xAxes: [
				{
					stacked: true,
				},
			],
			yAxes: [
				{
					stacked: true,
				},
			],
		},
	},
});

var multipleBarChart = document
	.getElementById("statistikSuratBulan")
	.getContext("2d");
var myMultipleBarChart = new Chart(multipleBarChart, {
	type: "bar",
	data: {
		labels: [
			"Jan",
			"Feb",
			"Mar",
			"Apr",
			"May",
			"Jun",
			"Jul",
			"Aug",
			"Sep",
			"Oct",
			"Nov",
			"Dec",
		],
		datasets: [
			{
				label: "Surat Masuk",
				backgroundColor: "#716aca",
				borderColor: "#716aca",
				data: [
					sm_jan,
					sm_feb,
					sm_mar,
					sm_apr,
					sm_may,
					sm_jun,
					sm_jul,
					sm_aug,
					sm_sep,
					sm_oct,
					sm_nov,
					sm_dec,
				],
			},
			{
				label: "Surat Keluar",
				backgroundColor: "#f3545d",
				borderColor: "#f3545d",
				data: [
					sk_jan,
					sk_feb,
					sk_mar,
					sk_apr,
					sk_may,
					sk_jun,
					sk_jul,
					sk_aug,
					sk_sep,
					sk_oct,
					sk_nov,
					sk_dec,
				],
			},
		],
	},
	options: {
		responsive: true,
		maintainAspectRatio: false,
		legend: {
			position: "bottom",
		},
		title: {
			display: true,
			text: "Statistik Surat Berdasarkan Bulan",
		},
		tooltips: {
			mode: "index",
			intersect: false,
		},
		responsive: true,
		scales: {
			xAxes: [
				{
					stacked: true,
				},
			],
			yAxes: [
				{
					stacked: true,
				},
			],
		},
	},
});
