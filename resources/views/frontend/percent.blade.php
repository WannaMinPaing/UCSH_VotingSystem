@extends('frontend.layouts.app')
@section('title','Percent')
@section('content')


<div class="row mt-3"> 
    <div class="container-fluid d-flex justify-content-center"> 

        

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
                <div class="canvas-con">
                   <!-- <p>Total Users</p>  -->
                    <div class="canvas-con-inner">
                        <canvas id="mychart" height="250px" width="300px" ></canvas>
                    </div>
                    <div id="my-legend-con" class="legend-con d-none d-sm-block"></div>
                </div>

              
        </div>
       
        
    </div>
</div>




    <div class="row mt-5" >

        <div class="main-card mb-3 card col-xl-4 col-md-6 col-sm-12 d-flex justify-content-center"  style="width: 600px;" >
            <div class="card-body">
                <h5 class="card-title">Fist Year</h5>
                <div class="text-center" id="first_show"> </div>
                <div class="mb-3 progress">
                    <div id="first" class="progress-bar" role="progressbar" aria-valuenow="203" aria-valuemin="0" aria-valuemax="500" style="width:0;background-color:#cc07fe;"></div>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card col-xl-4 col-md-6 col-sm-12 d-flex justify-content-center" style="width: 600px;">
            <div class="card-body"><h5 class="card-title">Second Year</h5>
                <div class="text-center" id="second_show">   </div>
                <div class="mb-3 progress">
                    <div id="second" class="progress-bar" role="progressbar" aria-valuenow="463" aria-valuemin="0" aria-valuemax="500" style="width:0;background-color:#0740fe; "></div>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card col-xl-4 col-md-6 col-sm-12 d-flex justify-content-center" style="width: 600px;">
            <div class="card-body"><h5 class="card-title">Third Year</h5>
                <div class="text-center" id="third_show">   </div>
                <div class="mb-3 progress">
                    <div id="third" class="progress-bar" role="progressbar" aria-valuenow="463" aria-valuemin="0" aria-valuemax="500" style="width:0;background-color:#09efed;"></div>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card col-xl-4 col-md-6 col-sm-12 d-flex justify-content-center" style="width: 600px;">
            <div class="card-body"><h5 class="card-title">Fourth Year</h5>
                <div class="text-center" id="fourth_show">   </div>
                <div class="mb-3 progress">
                    <div id="fourth" class="progress-bar" role="progressbar" aria-valuenow="463" aria-valuemin="0" aria-valuemax="500" style="width:0;background-color:#38dc08;"></div>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card col-xl-4 col-md-6 col-sm-12 d-flex justify-content-center" style="width: 600px;">
            <div class="card-body"><h5 class="card-title">Fifth Year</h5>
                <div class="text-center" id="final_show">  </div>
                <div class="mb-3 progress">
                    <div id="final" class="progress-bar" role="progressbar" aria-valuenow="463" aria-valuemin="0" aria-valuemax="500" style="width:0;background-color:#cee005;"></div>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card col-xl-4 col-md-6 col-sm-12 d-flex justify-content-center" style="width: 600px;">
            <div class="card-body"><h5 class="card-title">Other</h5>
                <div class="text-center" id="other_show">   </div>
                <div class="mb-3 progress">
                    <div id="other" class="progress-bar" role="progressbar" aria-valuenow="463" aria-valuemin="0" aria-valuemax="500" style="width:0;background-color:#fe07c7;"></div>
                </div>
            </div>
        </div>

    </div>    
    

@endsection

@section('scripts')
<!--https://developers.google.com/chart/interactive/docs/gallery/piechart#donut
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>

<script>

var total_user,voted_user,unvote_user,fcount,scount,tcount,focount,ficount,ocount,tfcount,tscount,ttcount,tfocount,tficount,tocount;  


function count()
	{
		$.ajax({
					url:'/percent_count/',
					type : 'GET',
					success:function(data)
					{
                        voted_user=data[0];
                        unvote_user=data[1];
                        fcount=data[2];
                        scount=data[3];
                        tcount=data[4];
                        focount=data[5];
                        ficount=data[6];
                        ocount=data[7];  

                        progressbar();
                        chart();
                        show();
						
					}
				})			
	}


function progressbar()
{
    document.getElementById("first").style.width = (fcount/{{$tfcount}})*100 +"%"; 
    document.getElementById("second").style.width = (scount/{{$tscount}})*100 +"%"; 
    document.getElementById("third").style.width = (tcount/{{$ttcount}})*100 +"%"; 
    document.getElementById("fourth").style.width = (focount/{{$tfocount}})*100 +"%"; 
    document.getElementById("final").style.width = (ficount/{{$tficount}})*100 +"%"; 
    document.getElementById("other").style.width = (ocount/{{$tocount}})*100 +"%"; 
}    

function show()
{
    document.getElementById("first_show").innerHTML = fcount+" of "+ {{$tfcount}}+" voted";
    document.getElementById("second_show").innerHTML = scount+" of "+ {{$tscount}}+" voted";
    document.getElementById("third_show").innerHTML = tcount+" of "+ {{$ttcount}}+" voted";
    document.getElementById("fourth_show").innerHTML = focount+" of "+ {{$tfocount}}+" voted";
    document.getElementById("final_show").innerHTML = ficount+" of "+ {{$tficount}}+" voted";
    document.getElementById("other_show").innerHTML = ocount+" of "+ {{$tocount}}+" voted";
}
//https://codepen.io/israelo/pen/QQBodM  ==> chart 



    Chart.pluginService.register({
        beforeDraw: function (chart) {
                width = chart.chart.width,
                height = chart.chart.height,
                ctx = chart.chart.ctx;          
                ctx.restore();
            var fontSize = (height / 114).toFixed(2);
                ctx.font = fontSize + "em sans-serif";
                ctx.textBaseline = "middle";
            var text = chart.config.options.elements.center.text,
                textX = Math.round((width - ctx.measureText(text).width) / 2),
                textY = height / 2;
            ctx.fillText(text, textX, textY);
           // width=0;height=0;
            ctx.save();
        }
    });

   function chart()
{
    var chartData = [{"Voters":fcount , "voted":fcount }, {"Voters":scount , "voted":scount }, {"Voters":tcount, "voted":tcount }, {"Voters":focount, "voted":focount }, {"Voters":ficount, "voted":ficount }, {"Voters":ocount, "voted":ocount }, {"Voters":unvote_user, "voted":unvote_user }]

    var visitorData = [],
        sum = 0,
        visitData = [];

    for (var i = 0; i < chartData.length; i++) 
    {
        visitorData.push(chartData[i]['Voters'])
        visitData.push(chartData[i]['voted'])
        
        sum += ( voted_user / {{$total_user}} ) * 100;

        sum =parseFloat(sum).toFixed(1)+"%";
   
    }

    var textInside = sum.toString();

 
    var myChart = new Chart(document.getElementById('mychart'), {
        type: 'doughnut',
        animation:{
            animateScale:true
        },
        data: {
            labels: visitData,
            datasets: [{
                label: 'Voters',
                data: visitorData,
                backgroundColor: [               
                    "#cc07fe",
                    "#0740fe",
                    "#09efed",
                    "#38dc08",
                    "#cee005",
                    "#fe07c7",
                    "#fa0b07"
                ]
            }]
        },
        options: {
            elements: {
            center: {
                text: textInside
            }
            },
            responsive: true,
            legend: false,
            legendCallback: function(chart) {
                var legendHtml = [];
                legendHtml.push('<ul>');
                var item = chart.data.datasets[0];
                var name = ["First Year","Second Year","Third Year","Fourth Year","Fifth Year","Other","No vote"];
                for (var i=0; i < (item.data.length - 1); i++) {
                    legendHtml.push('<li>');
                    legendHtml.push('<span class="chart-legend" style="background-color:' + item.backgroundColor[i] +'"></span>');
                    //legendHtml.push('<span class="chart-legend-label-text">' + name[i] + '  - '+chart.data.labels[i]+' voted</span>');
                    legendHtml.push('<span class="chart-legend-label-text">' + name[i] + '</span>');
                    legendHtml.push('</li>');
                }

                    legendHtml.push('<li>');
                    legendHtml.push('<span class="chart-legend" style="background-color:' + item.backgroundColor[item.data.length - 1] +'"></span>');
                    //legendHtml.push('<span class="chart-legend-label-text"> Total unvote person - '+chart.data.labels[item.data.length - 1]+'</span>');
                    legendHtml.push('<span class="chart-legend-label-text"> Total unvoted person </span>');
                    legendHtml.push('</li>');

                legendHtml.push('</ul>');
                return legendHtml.join("");
            },
            tooltips: {
                enabled: true,
                mode: 'label',
                callbacks: {
                    label: function(tooltipItem, data) {
                        var indice = (tooltipItem.index);
                   
                            return tooltipItem.index != 6 ? data.labels[indice] + 'person voted' : data.labels[indice] + 'person unvote';
                        
                        
                        
                    }
                }
            },
        }
    });

 
    $('#my-legend-con').html(myChart.generateLegend());

    
}



$(document).ready(function()
{
   $("#nav_contact").css({"background-color": "red", "border-bottom-left-radius": "20px","border-top-right-radius":"20px","width":"70px"});
        count();
		window.setInterval('count();', 10000); 
});

</script>
@endsection

