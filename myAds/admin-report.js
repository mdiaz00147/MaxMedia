$(document).on('ready',function(){
    $(function () {
        $("#datepicker").datepicker({
            maxDate:-1,
            onSelect: function(selected) {
                $("#datepicker1").datepicker("option","minDate", selected)
            }
        });
        $("#datepicker1").datepicker({
            maxDate:-1,
            minDate: $("#datepicker").val()
        });
    });
    $('#example').DataTable({
        language:{
            "lengthMenu": "Listar Payments_MENU_",
            "zeroRecords": "No existen Placements",
            "info": "Listando paginas _PAGE_ de _PAGES_",
            "infoEmpty": "No existen apuestas disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search":"Buscar",
            "paginate":{
                "firts":"Prvio",
                "last":"Ultimo",
                "next":"Siguiente",
                "previous":"Previo"
            }
        }
    });
    (function( $ ) {
        $.widget( "custom.combobox", {

            _create: function() {
                this.wrapper = $( "<span>" )
                    .addClass( "custom-combobox" )
                    .insertAfter( this.element );

                this.element.hide();
                this._createAutocomplete();
                this._createShowAllButton();
            },

            _createAutocomplete: function() {
                var selected = this.element.children( ":selected" ),
                    value = selected.val() ? selected.text() : "";

                this.input = $( "<input>" )
                    .appendTo( this.wrapper )
                    .val( value )
                    .attr( "title", "" )
                    .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
                    .autocomplete({
                        delay: 0,
                        minLength: 0,
                        source: $.proxy( this, "_source" )
                    })
                    .tooltip({
                        tooltipClass: "ui-state-highlight"
                    });

                this._on( this.input, {
                    autocompleteselect: function( event, ui ) {
                        ui.item.option.selected = true;
                        this._trigger( "select", event, {
                            item: ui.item.option
                        });
                    },

                    autocompletechange: "_removeIfInvalid"
                });
            },

            _createShowAllButton: function() {
                var input = this.input,
                    wasOpen = false;

                $( "<a>" )
                    .attr( "tabIndex", -1 )
                    .attr( "title", "Show All Items" )
                    .tooltip()
                    .appendTo( this.wrapper )
                    .button({
                        icons: {
                            primary: "ui-icon-triangle-1-s"
                        },
                        text: false
                    })
                    .removeClass( "ui-corner-all" )
                    .addClass( "custom-combobox-toggle ui-corner-right" )
                    .mousedown(function() {
                        wasOpen = input.autocomplete( "widget" ).is( ":visible" );
                    })
                    .click(function() {
                        input.focus();

                        // Close if already visible
                        if ( wasOpen ) {
                            return;
                        }

                        // Pass empty string as value to search for, displaying all results
                        input.autocomplete( "search", "" );
                    });
            },

            _source: function( request, response ) {
                var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                response( this.element.children( "option" ).map(function() {
                    var text = $( this ).text();
                    if ( this.value && ( !request.term || matcher.test(text) ) )
                        return {
                            label: text,
                            value: text,
                            option: this
                        };
                }) );
            },

            _removeIfInvalid: function( event, ui ) {

                // Selected an item, nothing to do
                if ( ui.item ) {
                    return;
                }

                // Search for a match (case-insensitive)
                var value = this.input.val(),
                    valueLowerCase = value.toLowerCase(),
                    valid = false;
                this.element.children( "option" ).each(function() {
                    if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                        this.selected = valid = true;
                        return false;
                    }
                });

                // Found a match, nothing to do
                if ( valid ) {
                    return;
                }

                // Remove invalid value
                this.input
                    .val( "" )
                    .attr( "title", value + " didn't match any item" )
                    .tooltip( "open" );
                this.element.val( "" );
                this._delay(function() {
                    this.input.tooltip( "close" ).attr( "title", "" );
                }, 2500 );
                this.input.autocomplete( "instance" ).term = "";
            },

            _destroy: function() {
                this.wrapper.remove();
                this.element.show();
            }
        });
    })( jQuery );
    $('#8').addClass('active');
    $('#yesterday').on('click',function(){
        $('#yesterday').addClass('active');
        $('#8').removeClass('active');
        $('#current').removeClass('active');
        $('#last').removeClass('active');
        $('#custom').removeClass('active');
        $('#custom').text('Custom');
    });
    $('#8').on('click',function(){
        $('#8').addClass('active');
        $('#yesterday').removeClass('active');
        $('#current').removeClass('active');
        $('#last').removeClass('active');
        $('#custom').removeClass('active');
        $('#custom').text('Custom');
    });
    $('#current').on('click',function(){
        $('#current').addClass('active');
        $('#8').removeClass('active');
        $('#yesterday').removeClass('active');
        $('#last').removeClass('active');
        $('#custom').removeClass('active');
        $('#custom').text('Custom');
    });
    $('#last').on('click',function(){
        $('#last').addClass('active');
        $('#8').removeClass('active');
        $('#current').removeClass('active');
        $('#yesterday').removeClass('active');
        $('#custom').removeClass('active');
        $('#custom').text('Custom');
    });
    $('#8').click(function(){
        options.xAxis=[];
        options.series = [];
        var idad= $("#combobox-ad").val();
        var idweb= $(".combobox").val();
        var route = "admin/reportdate";
        var date = 'Last8';
        var token = $("#token").val();
        var table = $("#example tbody");
        var fila = "";
        if(idad == ''){
            idad = 0;
        }
        if($(".combobox").val() != '' ){
            $.ajax({
                url: BASEURL+route +'/'+idweb+'/'+idad+'/'+date,
                headers: {'X-CSRF-TOKEN': token},
                type: 'GET',
                dataType: 'json',
                data:{web: idweb},
                success:function(web){
                    $("#example tbody tr").remove();
                    var xAxis = {
                        categories: []
                    };
                    var seriesTotal = {
                        data: []
                    };
                    var Revenue = {
                        data: []
                    };
                    var Ecpm = {
                        data: []
                    };
                    seriesTotal.name = 'Impressions';
                    Revenue.name = 'Revenue';
                    Ecpm.name = 'Ecpm';
                    $.each(web.web,function(index,value){
                        var now = new Date(value.fecha);
                        xAxis.categories.push(now.format('M-d'));
                        seriesTotal.data.push(parseInt(value.impresiones_dia));
                        Revenue.data.push(parseInt(value.r));
                        Ecpm.data.push(parseInt(value.e));
                        var fila = "<tr>";
                        fila += "<td>"+value.fecha+"</td>";
                        fila += "<td>" + value.impresiones_dia + "</td>";
                        fila += "<td>" + value.click+ "</td>";
                        fila += "<td>% " + value.ctr + "</td>";
                        fila += "<td>$ " + value.e+ "</td>";
                        fila += "<td>$ " + value.r+ "</td>";
                        fila += "</tr>";
                        table.append(fila);
                        console.log(fila);
                    });
                    options.xAxis.push(xAxis);
                    options.series.push(seriesTotal);
                    options.series.push(Revenue);
                    options.series.push(Ecpm);
                    var chart = new Highcharts.Chart(options);
                },
                error:function(msj){
                    alert('Ocurrio un error en el servidor ..');
                }
            });
        }
    });
    $('#yesterday').click(function(){
        options.xAxis=[];
        options.series = [];
        var idad= $("#combobox-ad").val();
        var idweb= $(".combobox").val();
        var route = "admin/reportdate";
        var date = 'yesterday';
        var token = $("#token").val();
        var table = $("#example tbody");
        if(idad == ''){
            idad = 0;
        }
        if($(".combobox").val() != '' ){
            $.ajax({
                url: BASEURL+route +'/'+idweb+'/'+idad+'/'+date,
                headers: {'X-CSRF-TOKEN': token},
                type: 'GET',
                dataType: 'json',
                data:{web: idweb},
                success:function(web){
                    $("#example tbody tr").remove();
                    var xAxis = {
                        categories: []
                    };
                    var seriesTotal = {
                        data: []
                    };
                    var Revenue = {
                        data: []
                    };
                    var Ecpm = {
                        data: []
                    };
                    seriesTotal.name = 'Impressions';
                    Revenue.name = 'Revenue';
                    Ecpm.name = 'Ecpm';
                    console.log(web);
                    $.each(web.web,function(index,value){
                        var now = new Date(value.fecha);
                        xAxis.categories.push(now.format('M-d'));
                        seriesTotal.data.push(parseInt(value.impresiones_dia));
                        Revenue.data.push(parseInt(value.r));
                        Ecpm.data.push(parseInt(value.e));
                        var fila = "<tr>";
                        fila += "<td>"+value.fecha+"</td>";
                        fila += "<td>" + value.impresiones_dia + "</td>";
                        fila += "<td>" + value.click+ "</td>";
                        fila += "<td>% " + value.ctr + "</td>";
                        fila += "<td>$ " + value.ecpm+ "</td>";
                        fila += "<td>$ " + value.r+ "</td>";
                        fila += "</tr>";
                        table.append(fila);
                    });
                    options.xAxis.push(xAxis);
                    options.series.push(seriesTotal);
                    options.series.push(Revenue);
                    options.series.push(Ecpm);
                    var chart = new Highcharts.Chart(options);
                },
                error:function(msj){
                    alert('Ocurrio un error en el servidor ..');
                }
            });
        }
    });
    $('#current').click(function(){
        options.xAxis=[];
        options.series = [];
        var idad= $("#combobox-ad").val();
        var idweb= $(".combobox").val();
        var route = "admin/reportdate";
        var date = 'current';
        var token = $("#token").val();
        var table = $("#example tbody");
        if(idad == ''){
            idad = 0;
        }
        if($(".combobox").val() != '' ){
            $.ajax({
                url: BASEURL+route +'/'+idweb+'/'+idad+'/'+date,
                headers: {'X-CSRF-TOKEN': token},
                type: 'GET',
                dataType: 'json',
                data:{web: idweb},
                success:function(web){
                    $("#example tbody tr").remove();
                    var xAxis = {
                        categories: []
                    };
                    var seriesTotal = {
                        data: []
                    };
                    var Revenue = {
                        data: []
                    };
                    var Ecpm = {
                        data: []
                    };
                    seriesTotal.name = 'Impressions';
                    Revenue.name = 'Revenue';
                    Ecpm.name = 'Ecpm';
                    console.log(web);
                    $.each(web.web,function(index,value){
                        var now = new Date(value.fecha);
                        xAxis.categories.push(now.format('M-d'));
                        seriesTotal.data.push(parseInt(value.impresiones_dia));
                        Revenue.data.push(parseInt(value.r));
                        Ecpm.data.push(parseInt(value.e));
                        var fila = "<tr>";
                        fila += "<td>"+value.fecha+"</td>";
                        fila += "<td>" + value.impresiones_dia + "</td>";
                        fila += "<td>" + value.click+ "</td>";
                        fila += "<td>% " + value.ctr + "</td>";
                        fila += "<td>$ " + value.e+ "</td>";
                        fila += "<td>$ " + value.r+ "</td>";
                        fila += "</tr>";
                        table.append(fila);
                    });
                    options.xAxis.push(xAxis);
                    options.series.push(seriesTotal);
                    options.series.push(Revenue);
                    options.series.push(Ecpm);
                    var chart = new Highcharts.Chart(options);
                },
                error:function(msj){
                    alert('Ocurrio un error en el servidor ..');
                }
            });
        }
    });
    $('#last').click(function(){
        options.xAxis=[];
        options.series = [];
        var idad= $("#combobox-ad").val();
        var idweb= $(".combobox").val();
        var route = "admin/reportdate";
        var date = 'last';
        var token = $("#token").val();
        var table = $("#example tbody");
        if(idad == ''){
            idad = 0;
        }
        if($(".combobox").val() != '' ){

            $.ajax({
                url: BASEURL+route +'/'+idweb+'/'+idad+'/'+date,
                headers: {'X-CSRF-TOKEN': token},
                type: 'GET',
                dataType: 'json',
                data:{web: idweb},
                success:function(web){
                    $("#example tbody tr").remove();
                    var xAxis = {
                        categories: []
                    };
                    var seriesTotal = {
                        data: []
                    };       var Revenue = {
                        data: []
                    };
                    var Ecpm = {
                        data: []
                    };
                    seriesTotal.name = 'Impressions';
                    Revenue.name = 'Revenue';
                    Ecpm.name = 'Ecpm';
                    console.log(web);
                    $.each(web.web,function(index,value){
                        var now = new Date(value.fecha);
                        xAxis.categories.push(now.format('M-d'));
                        seriesTotal.data.push(parseInt(value.impresiones_dia));
                        Revenue.data.push(parseInt(value.r));
                        Ecpm.data.push(parseInt(value.e));
                        var fila = "<tr>";
                        fila += "<td>"+value.fecha+"</td>";
                        fila += "<td>" + value.impresiones_dia + "</td>";
                        fila += "<td>" + value.click+ "</td>";
                        fila += "<td>% " + value.ctr + "</td>";
                        fila += "<td>$ " + value.e+ "</td>";
                        fila += "<td>$ " + value.r+ "</td>";
                        fila += "</tr>";
                        table.append(fila);
                    });
                    options.xAxis.push(xAxis);
                    options.series.push(seriesTotal);
                    options.series.push(Revenue);
                    options.series.push(Ecpm);
                    var chart = new Highcharts.Chart(options);
                },
                error:function(msj){
                    alert('Ocurrio un error en el servidor ..');
                }
            });
        }
    });
var options =      {
    chart: {
        renderTo: 'container',
        type: ''
    },
    title: {
        text: 'Maxmedia Report',
        x: -20 //center
    },
    subtitle: {
        text: 'Your reports',
        x: -20
    },
    xAxis: [],
    yAxis: {
        title: {
            text: ''
        },
        plotLines: [{
            value: 0,
            width: 1,
            color: '#808080'
        }]
    },
    tooltip: {
        valueSuffix: ''
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle',
        borderWidth: 0
    },
    series:[]

};
    $( "#combobox-ad" ).combobox({
        select: function (event, ui) {
            if($('.combobox').val() != '' && $('.combobox').val() != 'all' ){
                options.xAxis=[];
                options.series = [];
                var valor= $(this).val();
                var webs = $(".combobox");
                var ads = $(this);
                var route = "admin/reportad";
                var idweb = $('.combobox').val();
                var token = $("#token").val();
                var table = $("#example tbody");
                if($(this).val() != '')
                {
                    $.ajax({
                        url: BASEURL+route +'/'+valor+'/'+idweb,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'GET',
                        dataType: 'json',
                        data:{web: valor},
                        beforeSend: function ()
                        {
                            webs.prop('disabled', true);
                        },
                        success:function(web){
                            $("#example tbody tr").remove();
                            ads.prop('disabled', false);
                            webs.find('option').remove();
                            var xAxis = {
                                categories: []
                            };
                            var seriesTotal = {
                                data: []
                            };
                            var Revenue = {
                                data: []
                            };
                            var Ecpm = {
                                data: []
                            };
                            seriesTotal.name = 'Impressions';
                            Revenue.name = 'Revenue';
                            Ecpm.name = 'Ecpm';
                            $.each(web.web,function(index,value){
                                var now = new Date(value.fecha);
                                xAxis.categories.push(now.format('M-d'));
                            });
                            $.each(web.ads,function(index,value){
                                webs.append('<option value="' + value.id + '">' + value.nombre + '</option>');
                            });  webs.append('<option value="all">All sites</option>');
                            webs.prop('disabled', false);
                            $.each(web.web,function(index,value){
                                var now = new Date(value.fecha);
                                xAxis.categories.push(now.format('M-d'));
                                seriesTotal.data.push(parseInt(value.impresiones_dia));
                                Revenue.data.push(parseInt(value.r));
                                Ecpm.data.push(parseInt(value.e));
                                var fila = "<tr>";
                                fila += "<td>"+value.fecha+"</td>";
                                fila += "<td>" + value.impresiones_dia + "</td>";
                                fila += "<td>" + value.click+ "</td>";
                                fila += "<td>% " + value.ctr + "</td>";
                                fila += "<td>$ " + value.e+ "</td>";
                                fila += "<td>$ " + value.r+ "</td>";
                                fila += "</tr>";
                                table.append(fila);
                            });
                            options.xAxis.push(xAxis);
                            options.series.push(seriesTotal);
                            options.series.push(Revenue);
                            options.series.push(Ecpm);
                            var chart = new Highcharts.Chart(options);
                        },
                        error:function(msj){
                            alert('Ocurrio un error en el servidor ..');
                            ads.prop('disabled', false);
                        }
                    });
                }else{
                    webs.find('option').remove();
                    webs.prop('disabled', true);
                }
            }else{
                options.xAxis=[];
                options.series = [];
                var valor= $(this).val();
                var webs = $(".combobox");
                var ads = $(this);
                var route = "admin/reportad";
                var token = $("#token").val();
                var idweb = 0;
                var table = $("#example tbody");
                if($(this).val() != '')
                {
                    $.ajax({
                        url: BASEURL+route +'/'+valor+'/'+idweb,
                        headers: {'X-CSRF-TOKEN': token},
                        type: 'GET',
                        dataType: 'json',
                        data:{web: valor},
                        beforeSend: function ()
                        {
                            webs.prop('disabled', true);
                        },
                        success:function(web){
                            $("#example tbody tr").remove();
                            ads.prop('disabled', false);
                            webs.find('option').remove();
                            var xAxis = {
                                categories: []
                            };
                            var seriesTotal = {
                                data: []
                            };   var Revenue = {
                                data: []
                            };
                            var Ecpm = {
                                data: []
                            };
                            seriesTotal.name = 'Impressions';
                            Revenue.name = 'Revenue';
                            Ecpm.name = 'Ecpm';
                            $.each(web.ads,function(index,value){
                                webs.append('<option value="' + value.id + '">' + value.nombre + '</option>');
                            });  webs.append('<option value="all">All sites</option>');
                            webs.prop('disabled', false);
                            $.each(web.web,function(index,value){
                                var now = new Date(value.fecha);
                                xAxis.categories.push(now.format('M-d'));
                                seriesTotal.data.push(parseInt(value.impresiones_dia));
                                Revenue.data.push(parseInt(value.r));
                                Ecpm.data.push(parseInt(value.e));
                                var fila = "<tr>";
                                fila += "<td>"+value.fecha+"</td>";
                                fila += "<td>" + value.impresiones_dia + "</td>";
                                fila += "<td>" + value.click+ "</td>";
                                fila += "<td>% " + value.ctr + "</td>";
                                fila += "<td>$ " + value.e+ "</td>";
                                fila += "<td>$ " + value.r+ "</td>";
                                fila += "</tr>";

                                table.append(fila);
                            });
                            options.xAxis.push(xAxis);
                            options.series.push(seriesTotal);
                            options.series.push(Revenue);
                            options.series.push(Ecpm);
                            var chart = new Highcharts.Chart(options);
                        },
                        error:function(msj){
                            alert('Ocurrio un error en el servidor ..');
                            ads.prop('disabled', false);
                        }
                    });
                }else{
                    webs.find('option').remove();
                    webs.prop('disabled', true);
                }
            }
        }
    });
    $( "#comboboxa" ).combobox(
    );
    $( ".combobox" ).combobox({
        select: function (event, ui) {
            options.xAxis=[];
            options.series = [];
            var valor= $(this).val();
            var ads = $("#combobox-ad");
            var webs = $(this);
            var route = "admin/reports";
            var token = $("#token").val();
            var table = $("#example tbody");
            if($(this).val() != '')
            {
                $.ajax({
                    url: BASEURL+route +'/'+valor,
                    headers: {'X-CSRF-TOKEN': token},
                    type: 'GET',
                    dataType: 'json',
                    data:{web: valor},
                    beforeSend: function ()
                    {
                        webs.prop('disabled', true);
                    },
                    success:function(web){
                        $("#example tbody tr").remove();
                        webs.prop('disabled', false);
                        ads.find('option').remove();
                        var xAxis = {
                            categories: []
                        };
                        var seriesTotal = {
                            data: []
                        }; var Revenue = {
                            data: []
                        };
                        var Ecpm = {
                            data: []
                        };
                        seriesTotal.name = 'Impressions';
                        Revenue.name = 'Revenue';
                        Ecpm.name = 'Ecpm';
                        $.each(web.ads,function(index,value){

                            ads.append('<option value="' + value.id + '">' + value.nombre + '</option>');
                        }); ads.append('<option value="all">Evrything</option>');
                        ads.prop('disabled', false);
                        $.each(web.web,function(index,value){
                            var now = new Date(value.fecha);
                            xAxis.categories.push(now.format('M-d'));
                            seriesTotal.data.push(parseInt(value.impresiones_dia));
                            Revenue.data.push(parseInt(value.r));
                            Ecpm.data.push(parseInt(value.e));
                            var fila = "<tr>";
                            fila += "<td>"+value.fecha+"</td>";
                            fila += "<td>" + value.impresiones_dia + "</td>";
                            fila += "<td>" + value.click+ "</td>";
                            fila += "<td>% " + value.ctr + "</td>";
                            fila += "<td>$ " + value.e+ "</td>";
                            fila += "<td>$ " + value.r+ "</td>";
                            fila += "</tr>";

                            table.append(fila);
                        });
                        options.xAxis.push(xAxis);
                        options.series.push(seriesTotal);
                        options.series.push(Revenue);
                        options.series.push(Ecpm);
                        var chart = new Highcharts.Chart(options);
                    },
                    error:function(msj){
                        alert('Ocurrio un error en el servidor ..');
                        webs.prop('disabled', false);
                    }
                });
            }else{
                ads.find('option').remove();
                ads.prop('disabled', true);
            }
        }
    });
    $( "#form" ).submit(function( event ) {
        event.preventDefault();
        options.xAxis=[];
        options.series = [];
        var date= ($('#datepicker').val());
        var todate= ($('#datepicker1').val());

        var ads = $("#combobox-ad").val();
        var webs = $(".combobox").val();
        var route = "admin/reporttodate";
        var token = $("#token2").val();
        var table = $("#example tbody");
        if( date != '' && todate !='' )
        {
            $.ajax({
                url: BASEURL+route,
                headers: {'X-CSRF-TOKEN': token},
                type: 'POST',
                dataType: 'json',

                data:{date: (date), todate: (todate), ad:ads ,web:webs},
                success:function(web){
                    $("#example tbody tr").remove();
                    $('#last').removeClass('active');
                    $('#8').removeClass('active');
                    $('#current').removeClass('active');
                    $('#yesterday').removeClass('active');
                    $('#custom').addClass('active');
                    $('#custom').text('Custom:'+date+' - '+todate);
                    var xAxis = {
                        categories: []
                    };
                    var seriesTotal = {
                        data: []
                    }; var Revenue = {
                        data: []
                    };
                    var Ecpm = {
                        data: []
                    };
                    seriesTotal.name = 'Impressions';
                    Revenue.name = 'Revenue';
                    Ecpm.name = 'Ecpm';

                    $.each(web.web,function(index,value){
                        var now = new Date(value.fecha);
                        xAxis.categories.push(now.format('M-d'));
                        seriesTotal.data.push(parseInt(value.impresiones_dia));
                        Revenue.data.push(parseInt(value.r));
                        Ecpm.data.push(parseInt(value.e));
                        var fila = "<tr>";
                        fila += "<td>"+value.fecha+"</td>";
                        fila += "<td>" + value.impresiones_dia + "</td>";
                        fila += "<td>" + value.click+ "</td>";
                        fila += "<td>% " + value.ctr + "</td>";
                        fila += "<td>$ " + value.e+ "</td>";
                        fila += "<td>$ " + value.r+ "</td>";
                        fila += "</tr>";

                        table.append(fila);
                    });
                    options.xAxis.push(xAxis);
                    options.series.push(seriesTotal);
                    options.series.push(Revenue);
                    options.series.push(Ecpm);
                    $('#Mymodal').modal('hide');
                    var chart = new Highcharts.Chart(options);
                },
                error:function(msj){
                    alert('Ocurrio un error en el servidor ..');
                }
            });
        }else{
        }
    });
});
