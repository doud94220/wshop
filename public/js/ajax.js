$(".close").on("click", function() { 
//console.log('ici');   
	var current_elem = $(this);
//console.log(current_elem);
	$.ajax({
        url : 'ajax_delete_product.php',
        type : 'post',
        data : { id: $(this).attr('data-id') },
        success : function (res) {
            try
            {
//console.log('la');
//console.log(res);
//return;
                res = $.parseJSON(res);
//console.log(res);
                if (res.success == true) {
                	current_elem.parents('.bloc_product').remove();
                }

                window.location.reload(true);
            }
            catch (e)
            {
                console.error("parseJSON");
                return;
            }
        }
    });
});

$("#add-store").on("click", function() {
//console.log('laaaaa');
    $.ajax({
            url: 'store_add_validation.php',
            type: 'POST',
            data: {
                "nom-magasin": $('#nouveau-mag').val()
            },
            success: function () {
                alert("La creation du magasin en PUT est un succès !");
                //window.location.href = "/store_list.php";
            },
            error: function (xhr, status, error) {
                alert('L appel en POST a échoué...:' + xhr.responseText);
            }
        });
});

$("#delete-store").on("click", function()
{
    $.ajax({
            url: 'store_delete_validation.php',
            type: 'DELETE',
            data: {
                "id-magasin": $('#suppression-mag').val()
            },
            success: function () {
                alert("La suppression du magasin en DELETE est un succès !");
            },
            error: function (xhr, status, error) {
                alert('L appel en DELETE a échoué...:' + xhr.responseText);
            }
        });
});

$("#modify-name-store").on("click", function()
{
    $.ajax({
            url: 'store_modify_validation.php',
            type: 'PUT',
            data: {
                "id-mag": $('#id-mag').val(),
                "maj-nom-mag": $('#maj-nom-mag').val()
            },
            success: function () {
                alert("La modification du magasin en PUT est un succès !");
            },
            error: function (xhr, status, error) {
                alert('L appel en PUT a échoué...:' + xhr.responseText);
            }
        });
});