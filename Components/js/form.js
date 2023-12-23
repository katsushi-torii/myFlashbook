//loop till 5
for(let i = 1; i < 6; i++){
    let newOption = $(`
        <option value="${i}">${i}</option>
    `);
    $('#meaningNum').append(newOption);
}

//the input will appear depending on which number is selected on the select
$('#meaningNum').on('change', function(){
    //reset the input
    $('.meanings input').remove();

    for(let i = 0; i < $("#meaningNum").val(); i++){
        let newInput = $(`     
        <input type="text" name="meaning${i}" id="meaning${i}" value="" required>
        `);
        if(i < meaningsArray.length){
            newInput = $(`     
            <input type="text" name="meaning${i}" id="meaning${i}" value="${meaningsArray[i]}" required>
            `);
        }
        $(".meanings").append(newInput);
    }
})

//number of meanings and each meanings will be displayed on the form for the default value
$("#meaningNum option").eq(meaningNum).prop("selected","selected");

const meaningsArray = meanings.split(", ");
for(let i = 0; i < $("#meaningNum").val(); i++){
    newInput = $(`     
    <input type="text" name="meaning${i}" id="meaning${i}" value="${meaningsArray[i]}" required>
    `);
    $(".meanings").append(newInput);
}

let currentDate = new Date();
let year = currentDate.getFullYear();
let month = currentDate.getMonth() + 1;
let day = currentDate.getDate();
let date = year + "-" + month + "-" + day;
$('.addDate').val(date);
