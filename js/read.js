

var data = [
    {
        value: `ファッション`,
        color: "#F7464A",
        highlight: "#FF5A5E",
        label: "Red"
    },
    {
        value: `音楽`,
        color: "#46BFBD",
        highlight: "#5AD3D1",
        label: "Green"
    },
    {
        value: `アート`,
        color: "#FDB45C",
        highlight: "#FFC870",
        label: "Yellow"
    },
    {
        value: `社会福祉`,
        color: "#062A63",
        highlight: "#FF5A5E",
        label: "blue"
    },
    {
        value: `マンガ・ゲーム`,
        color: "#122139",
        highlight: "#5AD3D1",
        label: "gray"
    }
];

var myChart = new Chart(document.getElementById("mycanvas").getContext("2d")).Doughnut(data);
// var myChart = new Chart(document.getElementById("mycanvas").getContext("field").Doughnut(data);