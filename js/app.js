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
                $('#table').append(' <tbody><tr><td>'+data[i].product_name+'</td>\
                                              <td>'+data[i].product_quantity+'</td>\
                                              <td>'+data[i].product_desc+'</td>\
                                              <td><a href=""class="btn btn-primary btn-sm">View</a></td>\
                                              <td><a href=""class="btn btn-warning btn-sm">Edit</a></td>\
                                              <td><a href=""class="btn btn-danger btn-sm">Delete</a></td>\
                                      </tr> </tbody>\
                                       ');
            }
            
        }
    });
}
function addProduct()
{
    var product_name =$('#product_name').val();
    var product_quantity =$('#product_quantity').val();
    var product_desc  =$('#product_desc').val();
    //create an object literal
    var data = {product_name:product_name,
        product_quantity:product_quantity,
        product_desc:product_desc};
    //convert to json string
        jsonData=JSON.stringify(data);

    $.ajax({
        url:'includes/addProducts.inc.php',
        type:'post',
        data:{data:jsonData},
        success:function(data,status)
        {
            $("#table tbody").remove();
            displayData();
            console.log(status);
            
        },
        error: function(e){
            console.log(e.message);
        }
    });
}