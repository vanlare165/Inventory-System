$(document).ready(function(){
    displayData();
});
function displayData()
{
    $.ajax({
        url:'includes/index.inc.php',
        type:'get',
        success:function(response)
        {
            var data = JSON.parse(response);
            for( i in data){
                $('#table').append(' <tbody><tr><td><img src="images/'+data[i].product_image+'" width="75" height="75" class="img-thumbnail"></td>			\
                                            <td>'+data[i].product_name+'</td>\
                                              <td>'+data[i].product_quantity+'</td>\
                                              <td>'+data[i].product_desc+'</td>\
                                              <td>\
                                              <button class="btn btn-warning btn-sm"onclick="getUpdateDetails('+data[i].id+')">Edit</button>\
                                              <button class="btn btn-danger btn-sm" onclick="getDeleteId('+data[i].id+')">Delete</button></td>\
                                      </tr> </tbody>\
                                       ');
            }
           
          
            console.log(response);
        }
       
            
    });
}
function addProduct()
{
    var product_name =$('#product_name').val();
    var product_quantity =$('#product_quantity').val();
    var product_desc  =$('#product_desc').val();
    var image_file = $('.fileToUpload').prop('files')[0];
    var image_name = $('#image_name').val();
    //create an object literal
    var data = {product_name:product_name,
        product_quantity:product_quantity,
        product_desc:product_desc};
    //convert to json string
        jsonData=JSON.stringify(data);
        var form_data = new FormData();
        form_data.append("image",image_file);
        form_data.append("image_name",image_name);
        form_data.append("data",jsonData);



    $.ajax({
        url:'includes/addProducts.inc.php',
        type:'post',
        dataType:'script',
        cache:false,
        contentType:false,
        processData:false,
        data:form_data,
        success:function(data,status)
        {
            $("#table tbody").remove();
            displayData();
            console.log(status);
            successAlert('You have added a product!');
            $('#addProduct').modal('hide');
            
        },
        error: function(e){
            console.log(e.message);
        }
    });
}
function updateProduct()
{
    var product_name =$('#updateproduct_name').val();
    var product_quantity =$('#updateproduct_quantity').val();
    var product_desc  =$('#updateproduct_desc').val();
    var image_file = $('.updatefileToUpload').prop('files')[0];
    var image_name = $('#updateimage_name').val();
    var id  =$('#hiddenId').val();
    //create an object literal
    var data = {product_name:product_name,
        product_quantity:product_quantity,
        product_desc:product_desc,
        id:id};
    //convert to json string
        jsonData=JSON.stringify(data);
        var form_data = new FormData();
        form_data.append("image",image_file);
        form_data.append("image_name",image_name);
        form_data.append("data",jsonData);

    $.ajax({
        url:'includes/updateProduct.inc.php',
        type:'post',
        dataType:'script',
        cache:false,
        contentType:false,
        processData:false,
        data:form_data,
        success:function(response,status)
        {
            $("#table tbody").remove();
            displayData();
            console.log(status);
            successAlert(response);
            $('#updateProduct').modal('hide');
            
        },
        error: function(e){
            console.log(e.message);
        }
    });
}
function getDeleteId(id)
{
    $('#hiddenId').val(id);
    $('#deleteProduct').modal('show');
   
}
function getUpdateDetails(id)
{
    $('#hiddenId').val(id);

    $.ajax({
        url:'includes/getProductDetails.inc.php',
        type:'post',
        data:{id:id},
        success:function(response)
        {
            var data = JSON.parse(response);
            for( i in data){

                $('#updateproduct_name').val(data[i].product_name);
                $('#updateproduct_desc').val(data[i].product_desc);
                $('#updateproduct_quantity').val(data[i].product_quantity);
            }
       
           
            
        },
        error: function(e){
            console.log(e.message);
        }
    });

    $('#updateProduct').modal('show');
   
}

function deleteProduct()
 
{
    var id =$('#hiddenId').val();

 
    $.ajax({
        url:"includes/deleteProduct.inc.php",
        type:'post',
        data:{
            id:id
        },
        success:function(response,status)
        {
            $("#table tbody").remove();
            displayData();
            console.log(response);
            deleteAlert(response);
            $('#deleteProduct').modal('hide');
            
        },
        error: function(e){
            console.log(e.message);
        }

    });
}
function deleteAlert(message)
{
    $('#alert').append('<div class="alert alert-danger" role="alert">\
     '+message+'\
  </div>');
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
}
function successAlert(message)
{
    $('#alert').append('<div class="alert alert-success" role="alert">\
    <strong>Success!</strong> '+message+'\
  </div>');
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
}