

<div class="row">







      <div class="col-xs-12 col-m-10 col-xs-offset-1 col-xs-offset-0">

          <table class="table table-striped table-hover">

              <thead>

                  <tr>

                      <th>#</th>

                      <th>Resultat <span class="glyphicon glyphicon-eye-open"></span></th>

                      <th>File Name</th>

                      <th>View</th>

                      <th>Download</th>

                  </tr>

              </thead>

              <tbody id="tbd">





              </tbody>

          </table>



      </div>

  </div>





</div>
<script>
function populateTestList(kurs){

          $.ajax({



                //url: 'http://localhost/tentor/getTen.php',

				url: 'api',

				data: {action: kurs},

				type: 'get',

                crossDomain: true,

				//dataType : "html",

                success: function (result) {

				$( "#tbd" ).empty();

				$("#tbd").append(result);

                $(".resultat").mousemove(function(e){

        $("#canvas").show();

        var x = e.pageX;

        var y = e.pageY;

        $("#canvas").css('top', y+10);

        $("#canvas").css('left', x+5);

    });

        $(".resultat").mouseout(function(){
          $("#canvas").css('top', 0);

          $("#canvas").css('left', 0);
        $("#canvas").hide();



    });



        $(".resultat").mouseover(function(){



            var path= "./uploads/"+$(this).next().text();

            loadPdf(path);

            //alert(path);

        });

                },

               error: function(){

                   alert('request failed');

               }

            });



  }
</script>
<canvas id="canvas"></canvas>

<script>

$("#canvas").hide();

function loadPdf(path){

    var canvas = document.getElementById('canvas');

    var context = canvas.getContext('2d');

    canvas.height = 100;

    canvas.width = 220;

    context.fillStyle = "white";

    context.fillRect(0, 0, canvas.width, canvas.height);

    context.fillStyle = "black";

    context.font = "30px Arial";

    context.fillText("Laddar",50,60 );

var url = path;

PDFJS.disableWorker = true;

PDFJS.getDocument(url).then(function (pdf) {

  pdf.getPage(1).then(function (page) {

    var pdfViewBox = page.pageInfo.view;

var pdfPageWidth = pdfViewBox[2];

var pdfPageHeight = pdfViewBox[3];

    var scale = 1;

    var viewport = new PDFJS.PageViewport(pdfViewBox, scale, page.rotate, -70, -710);

    var canvas = document.getElementById('canvas');

    var context = canvas.getContext('2d');

    canvas.height = 100;

    canvas.width = 220;

    page.render(

        {canvasContext: context,

         viewport: viewport

        });

  });

});

}

</script>



<footer class="footer">

      <div class="container">

        <span class="text-muted">Developed by TobeCorp</span>

      </div>

    </footer>


</body>
</html>
