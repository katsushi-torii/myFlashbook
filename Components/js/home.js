$(".search").click(()=>{
    $(".filter").show();
})

$(".close").click(()=>{
    $(".filter").hide();
})

$('.filter [type="text"]').val(keyword);
for(let i = 0; i < 3; i++){
    if(aqquirement == $('#aqquirement option').eq(i).val()){
        $('#aqquirement option').eq(i).prop('selected',true);
    }
}
for(let i = 0; i < 5; i++){
    if(order == $('#sort option').eq(i).val()){
        $('#sort option').eq(i).prop('selected',true);
    }
}