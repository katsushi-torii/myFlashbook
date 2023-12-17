$('.quiz1').addClass('display');
let typedAnswer = "";
for(let i = 1; i < 11; i++){
    $(`#question${i}`).change((e)=>{
        typedAnswer = e.target.value;
    })
    let correctAnswer = $(`.quiz${i} strong`).eq(0).html();
    $(`.check${i}`).click((e) => {
        console.log(typedAnswer, correctAnswer);
        if(correctAnswer == typedAnswer){
            $(`.quiz${i} i`).addClass("fa-solid fa-thumbs-up");
            $(`.quiz${i} .answer`).css("display", "flex");
        }else if(typedAnswer == ""){
            $(`.quiz${i} p`).show();
        }else{
            $(`.quiz${i} i`).addClass("fa-solid fa-x");
            $(`.quiz${i} .answer`).css("display", "flex");
        }
    })
}

function next(){
    $('.display').next().addClass('display');
    $('.display').eq(0).removeClass('display');
    typedAnswer = "";
}