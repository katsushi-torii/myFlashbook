//loop till 5
for(let i = 1; i < 6; i++){
    let newOption = $(`
        <option value="${i}">${i}</option>
    `);
    $('#meaningNum').append(newOption);
}
//点数が選ばれるたびにその数にあった得点者記入欄を表示
$('#meaningNum').on('change', function(){
    //得点者inputをリセット
    $('.meanings input').remove();
    for(let i = 0; i < $('#meaningNum').val(); i++){
        let newInput = $(`     
            <input type="text" name="meaning${i}" id="meaning${i}">
        `);
        $('.meanings').append(newInput);
    }
})