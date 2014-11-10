$(document).ready(function(){
    
    $('.add-autor').click(function(e){
        e.preventDefault();

        var $this = $(this);

        var autor_idx = $('.autor_idx');
        var key = 0;

        if(autor_idx.length) {
            key = parseInt(autor_idx.last().val()) + 1;
        }

        $.get(QT.url + '/ajax/autor',
            {
                key: key
            },
            function(data){
                $this.parents('.add-autor-wrap').before(data);
            }
        );
    });

    // Remove um autor da publicação
    $('.publicacao-autor').on('click', '.remover-autor', function(){
        $(this).parent().parent().remove();
    });
    
});