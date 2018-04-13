
<div id="teste"></div>
<iframe id="teste" src="http://54.94.188.1/listapragas/pragas.php?pagina=all" style="width: 100%; height: 400px;"></iframe>
<div id="teste2"></div>
<script>
    function carregaDados() {
        $.ajax({
    url: 'http://54.94.188.1/listapragas/pragas.php?pagina=all',
    type: 'GET',
    success: function(res) {
        
//        var headline = $(res.responseText).find('a');
        $("#teste2").html(res);
    }
}); 
        var html = $('teste').html();
         $('teste2').html(html);
//        iframe.each(function () {
//            var link = $(this).attr('href');
//            $('this').attr('href', 'teste');
//        });
    }
</script>

<input type="button" onclick="carregaDados();" title="Teste">