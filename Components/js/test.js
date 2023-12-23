$('.quiz1').addClass('display');
let typedAnswer = "";
let count = 0;
let results = [];
for(let i = 1; i < 11; i++){
    $(`#question${i}`).change((e)=>{
        typedAnswer = e.target.value;
    })
    let correctAnswer = $(`.quiz${i} strong`).eq(0).html();
    $(`.check${i}`).click((e) => {
        $(`.quiz${i} p`).hide();
        if(correctAnswer == typedAnswer){
            $(`.quiz${i} .answer i`).addClass("fa-solid fa-o");
            $(`.quiz${i} .answer`).css("display", "flex");
            count += 1;
            results.push(true);
        }else if(typedAnswer == ""){
            $(`.quiz${i} p`).show();
        }else{
            $(`.quiz${i} .answer i`).addClass("fa-solid fa-x");
            $(`.quiz${i} .answer`).css("display", "flex");
            results.push(false);
        }
    })
}

function next(){
    $('.display').next().addClass('display');
    $('.display').eq(0).removeClass('display');
    typedAnswer = "";
}

function result(){
    $('#score').val(count);
    $('#ids').val(ids);
    $('#results').val(results);
    $('form').submit();
}