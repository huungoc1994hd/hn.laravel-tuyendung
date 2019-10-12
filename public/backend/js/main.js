/*

Project     : DAdmin - Responsive Bootstrap HTML Admin Dashboard
Version     : 1.1
Author      : ThemeLooks
Author URI  : https://themeforest.net/user/themelooks

*/
(function(b){b(window);var f=b(document),g=b("body");b(function(){b("[data-bg-img]").css("background-image",function(){return'url("'+b(this).data("bg-img")+'")'}).addClass("bg--img").removeAttr("data-bg-img");var a=b('[data-toggle="tooltip"]');a.length&&a.tooltip();a=b('[data-trigger="selectmenu"]');a.length&&a.select2({minimumResultsForSearch:Infinity});f.on("change",'input[type="file"]',function(c){c.$el=b(this);c.$txt=0===c.target.files.length?"Choose File":c.target.files[0].name;c.$el.hasClass("custom-file-input")&&c.$el.next("span").text(c.$txt)});
a=b('[data-trigger="scrollbar"]');a.each(function(){var c=new PerfectScrollbar(this);var a=localStorage.getItem("ps."+this.classList[0]);null!==a&&(c.element.scrollTop=a)});a.on("ps-scroll-y",function(){localStorage.setItem("ps."+this.classList[0],this.scrollTop)});a=b('[data-trigger="range-slider"]');a.length&&a.ionRangeSlider();b('[data-trigger="sparkline"]').each(function(){var a=b(this);a.sparkline("html",{type:a.data("type"),barColor:a.data("color"),barWidth:a.data("width"),height:a.data("height"),
values:a.data("value")})});a=b('[data-trigger="sparklineChart01"]');a.length&&a.sparkline("html",{width:"100%",height:"100px",lineColor:"#ebebea",fillColor:"#ebebea",spotColor:"#2bb3c0",minSpotColor:"#2bb3c0",maxSpotColor:"#2bb3c0",spotRadius:"3"});(a=document.getElementById("morrisLineChart01"))&&new Morris.Line({element:a.id,data:[{degree:"30.05",a:46},{degree:"31.05",a:46},{degree:"01.06",a:42},{degree:"02.06",a:50},{degree:"03.06",a:22},{degree:"04.06",a:46},{degree:"05.06",a:52}],xkey:"degree",
ykeys:["a"],labels:["Progress"],lineColors:["#009378"],postUnits:"%",parseTime:!1,pointSize:0,lineWidth:2,gridLineColor:"#eee",resize:!0,hideHover:!0});(a=document.getElementById("morrisLineChart02"))&&new Morris.Line({element:a.id,data:[{month:"Feb",a:270,b:250},{month:"Mar",a:275,b:260},{month:"Apr",a:225,b:240},{month:"May",a:230,b:230},{month:"Jun",a:335,b:220}],xkey:"month",ykeys:["a","b"],labels:["Visitors","Sales"],lineColors:["#e16123","#2bb3c0"],parseTime:!1,pointSize:2,lineWidth:2,gridLineColor:"#eee",
resize:!0,hideHover:!0,axes:"x"});(a=document.getElementById("morrisLineChart03"))&&new Morris.Line({element:a.id,data:[{day:"S",a:20},{day:"M",a:30},{day:"T",a:40},{day:"W",a:20},{day:"T",a:10},{day:"F",a:10},{day:"S",a:5}],xkey:"day",ykeys:["a"],labels:["Overdue"],lineColors:["#e16123"],preUnits:"$",parseTime:!1,pointSize:4,gridLineColor:"#eee",resize:!0,hideHover:!0});(a=document.getElementById("morrisAreaChart01"))&&new Morris.Area({element:a.id,data:[{month:"Jan",a:0,b:0,c:500,d:0},{month:"Feb",
a:2E3,b:1500,c:500,d:1E3},{month:"Mar",a:2E3,b:2E3,c:1500,d:1500},{month:"Apr",a:2E3,b:2E3,c:1500,d:1500},{month:"May",a:2E3,b:2E3,c:1500,d:1500},{month:"Jun",a:1500,b:1200,c:2E3,d:2E3},{month:"Jul",a:300,b:2E3,c:2500,d:1200},{month:"Aug",a:2500,b:3E3,c:1500,d:2E3},{month:"Sep",a:1E3,b:1E3,c:1500,d:1E3},{month:"Oct",a:3500,b:1800,c:3E3,d:1500},{month:"Nov",a:3500,b:2E3,c:2E3,d:3500},{month:"Dec",a:5E3,b:1200,c:4500,d:4500}],xkey:"month",ykeys:["a","b","c","d"],labels:["Order","Shipment","Tax","Revenue"],
lineColors:["#e16123","#ff4040","#2bb3c0","#009378"],preUnits:"$",parseTime:!1,pointSize:0,lineWidth:0,gridLineColor:"#eee",resize:!0,hideHover:!0,behaveLikeLine:!0});(a=document.getElementById("morrisAreaChart02"))&&new Morris.Area({element:a.id,data:[{day:"20",a:0,b:50},{day:"21",a:200,b:250},{day:"22",a:380,b:250},{day:"23",a:400,b:450},{day:"24",a:790,b:350},{day:"25",a:600,b:650},{day:"26",a:800,b:850}],xkey:"day",ykeys:["a","b"],labels:["Total Debt","Total Equity"],lineColors:["#ff4040","#2bb3c0"],
preUnits:"$",parseTime:!1,pointSize:0,lineWidth:0,gridLineColor:"#eee",resize:!0,hideHover:!0,behaveLikeLine:!0});(a=document.getElementById("morrisAreaChart03"))&&new Morris.Area({element:a.id,data:[{month:"Jan",a:0,b:0,c:0,d:0},{month:"Feb",a:1200,b:0,c:0,d:0},{month:"Mar",a:0,b:700,c:0,d:0},{month:"Apr",a:0,b:0,c:1800,d:0},{month:"May",a:0,b:0,c:0,d:1200},{month:"Jun",a:0,b:700,c:0,d:0},{month:"Jul",a:0,b:0,c:0,d:0},{month:"Aug",a:0,b:0,c:1200,d:0},{month:"Sep",a:0,b:0,c:0,d:0},{month:"Oct",a:0,
b:1200,c:0,d:0},{month:"Nov",a:0,b:0,c:0,d:2400},{month:"Dec",a:0,b:0,c:0,d:0}],xkey:"month",ykeys:["a","b","c","d"],labels:["Product 1","Product 2","Product 3","Product 4"],lineColors:["#e16123","#ff4040","#2bb3c0","#009378"],preUnits:"$",parseTime:!1,pointSize:0,lineWidth:0,gridLineColor:"#eee",resize:!0,hideHover:!0,behaveLikeLine:!0});a=b('[data-trigger="jvectorMap"]');a.length&&a;a.each(function(){var a=b(this);a.vectorMap({map:"world_mill",backgroundColor:"transparent",regionStyle:{initial:{fill:"#494f50"},
selected:{fill:"#e16123"}},selectedRegions:a.data("map-selected")})});var d=b("#formWizard");d.length&&(d.validate({errorPlacement:function(){return!1},rules:{cpassword:{equalTo:"#password"}}}),d.steps({headerTag:"h3",bodyTag:"section",titleTemplate:'<span class="number">#index#</span> #title#',onStepChanging:function(){d.validate().settings.ignore=":disabled,:hidden";return d.valid()},onFinishing:function(){d.validate().settings.ignore=":disabled";return d.valid()}}));a=b(".records--list");var e=
b("#recordsListView");e.length&&(e.DataTable({responsive:!0,language:{lengthMenu:"View _MENU_ records"},dom:'<"topbar"<"toolbar"><"right"li>><"table-responsive"t>p',order:[],columnDefs:[{targets:"not-sortable",orderable:!1}]}),a.find(".toolbar").text(a.data("title")));a=b(".sidebar--nav");b.each(a.find("li"),function(){var a=b(this);a.children("a").length&&a.children("ul").length&&a.addClass("is-dropdown")});a.on("click",".is-dropdown > a",function(a){a.preventDefault();var c=b(this);a=c.siblings("ul");
c=c.parent();var d=c.siblings(".open");c.parent().parent(".sidebar--nav").length?(a.slideToggle(),c.toggleClass("open")):(a.add(d.children("ul")).slideToggle(),c.add(d).toggleClass("open"))});b('[data-toggle="sidebar"]').on("click",function(a){a.preventDefault();g.toggleClass("sidebar-mini")});b(".todo--panel").on("submit","form",function(a){a.preventDefault();a=b(this);var c=a.find(".form-control");b('<li class="list-group-item" style="display: none;"><label class="todo--label"><input type="checkbox" name="" value="1" class="todo--input"><span class="todo--text">'+
c.val()+'</span></label><a href="#" class="todo--remove">&times;</a></li>').appendTo(a.children(".list-group")).slideDown("slow");c.val("")}).on("click",".todo--remove",function(a){a.preventDefault();var c=b(this).parent("li");c.slideUp("slow",function(){c.remove()})})})})(jQuery);

var token = $("meta[name='csrf-token']").attr('content');

$.ajaxPrefilter(function (options, originalOptions, jqXHR) {
    jqXHR.setRequestHeader('X-CSRF-Token', token);
});

$(document).on('click', 'form button:submit', function() {
    let button = $(this);
    let form = button.parents('form');

    if (form.attr('data-validate') == 'true') {
        form.validate({
            submitHandler: function() {
                buttonLoader(button);
                return true;
            }
        });
    } else {
        buttonLoader(button);
    }
});

/* Action loader button */
function buttonLoader(buttonElement) {
    let loader = buttonElement.find("i[class*='fa-']");
    if (loader.length == 0) {
        let loaderTag = "<i class='fa fa-spin fa-spinner mr-2'></i>";
        buttonElement.prepend(loaderTag);
    } else {
        buttonElement.find("i[class*='fa-']").attr('class', 'fa fa-spin fa-spinner mr-2');
    }
    buttonElement.prop('disabled', true);
}

/* Redirect link */
$(document).on('click', 'a[data-method]', function(e) {
    let methodType = $(this).data('method');
    let confirmMsg = $(this).data('confirm');
    if (methodType == 'get') {
        return true;
    }

    e.preventDefault();
    let action = $(this).attr('href');
    let redirect = new Redirect();
    redirect.formAction(confirmMsg, methodType, action);
});
