<div class="container">
  <div class="jumbotron">
  <h1>Välkommen till tentaportalen för <?=$title?></h1>
  <p>Här kan du ladda ner tentasvar och dela med dig anonymt av dina egna svar</p>
  <h4>Antal tentor just nu från din förening: <?=$antal?> </h4>
</div>


<?php echo form_open_multipart(base_url().strtolower($title)); ?>
  <legend>Välj en tenta att ladda upp:</legend>
  <div class="form-group">

      <input type="file" name="file1"/>
      <input type="hidden" name="source" value="<?=strtolower($title)?>" />
      <p class="small">*Genom att ladda upp en tenta godkänner du att andra studenter kan ladda ner och visa tentan, observera också att det är i strid mot upphovsrättslagstiftningen att ladda upp någon annans tentamen eller en gemensamt skriven tentamen</p>
      <P>OBSERVERA ATT VI INTE KAN IDENTIFIERA SIG SOM ANVÄNDARE NÄR DU LADDAR UPP TENTOR, DOCK KAN UNIVERSITETET ELLER ANDRA INSTANSER SOM HAR KONTROLL ÖVER ANONYMITETSKODEN IDENTIFIERA DIG SOM PERSON</P>
      <input type="submit" name="submit" value="Upload" class="btn btn-info"/>
      <?php echo validation_errors();?>

      <div class="alert alert-info" role="alert" display: none>
        <strong class="yeet"><?=$errorMessage?></strong>
      </div>

  </div>
  <script>

  $('.yeet').fadeIn().delay(2000).fadeOut();
  </script>







</form>
