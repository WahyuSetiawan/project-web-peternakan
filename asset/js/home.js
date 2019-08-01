
$.ajax({
    url: "api/kandang",
}).done(function (msg) {
    console.log(msg);

    var data = [];
    data[0] = [];
    data[0]["kandang"] = "Stok Kandang";

    var data_keys = [];

    $.each(msg.result, function (index, value) {
        data[0][value.id_kandang] = value.stok_ayam;
        data_keys[index] = value.id_kandang;
    });

    console.log(data_keys);

    // Use Morris.Bar
    Morris.Bar({
        element: 'graph',
        axes: false,
        data: data,
        xkey: 'kandang',
        ykeys: data_keys,
        labels: data_keys,
    });
});

$.ajax({
    url: "api/pakan"
}).done(function (msg) {
    Morris.Area({
        element: 'graph-stok',
        data: msg.result,
        xkey: msg.x,
        ykeys: msg.keys,
        labels: msg.label
    }).on('click', function (i, row) {
        console.log(i, row);
    });
});

$.ajax({
    url: "api/umur"
}).done(function (data) {
    Morris.Donut({
        element: 'graph-home',
        data: data.result,
        backgroundColor: '#ccc',
        labelColor: '#060',
        colors: [
            '#0BA462',
            '#39B580',
            '#67C69D',
            '#95D7BB',
            '#95D7BB'
        ],
        formatter: function (x) { return x + " Ayam" }
    });
});


var week_data = [
    { "period": "2011 W27", "licensed": 3407, "sorned": 660 },
    { "period": "2011 W26", "licensed": 3351, "sorned": 629 },
    { "period": "2011 W25", "licensed": 3269, "sorned": 618 },
    { "period": "2011 W24", "licensed": 3246, "sorned": 661 },
    { "period": "2011 W23", "licensed": 3257, "sorned": 667 },
    { "period": "2011 W22", "licensed": 3248, "sorned": 627 },
    { "period": "2011 W21", "licensed": 3171, "sorned": 660 },
    { "period": "2011 W20", "licensed": 3171, "sorned": 676 },
    { "period": "2011 W19", "licensed": 3201, "sorned": 656 },
    { "period": "2011 W18", "licensed": 3215, "sorned": 622 },
    { "period": "2011 W17", "licensed": 3148, "sorned": 632 },
    { "period": "2011 W16", "licensed": 3155, "sorned": 681 },
    { "period": "2011 W15", "licensed": 3190, "sorned": 667 },
    { "period": "2011 W14", "licensed": 3226, "sorned": 620 },
    { "period": "2011 W13", "licensed": 3245, "sorned": null },
    { "period": "2011 W12", "licensed": 3289, "sorned": null },
    { "period": "2011 W11", "licensed": 3263, "sorned": null },
    { "period": "2011 W10", "licensed": 3189, "sorned": null },
    { "period": "2011 W09", "licensed": 3079, "sorned": null },
    { "period": "2011 W08", "licensed": 3085, "sorned": null },
    { "period": "2011 W07", "licensed": 3055, "sorned": null },
    { "period": "2011 W06", "licensed": 3063, "sorned": null },
    { "period": "2011 W05", "licensed": 2943, "sorned": null },
    { "period": "2011 W04", "licensed": 2806, "sorned": null },
    { "period": "2011 W03", "licensed": 2674, "sorned": null },
    { "period": "2011 W02", "licensed": 1702, "sorned": null },
    { "period": "2011 W01", "licensed": 1732, "sorned": null }
];
Morris.Line({
    element: 'graph-events',
    data: week_data,
    xkey: 'period',
    ykeys: ['licensed', 'sorned'],
    labels: ['Licensed', 'SORN'],
    events: [
        '2011-04',
        '2011-08'
    ]
});