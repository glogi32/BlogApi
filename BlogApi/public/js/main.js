$(document).ready(function(){
    getPosts()

    $("#perPage").on("change",getPosts);
    $("#sort").on("change",getPosts);
    $("#search").on("keyup",getPosts);
    $("#getWithCat").on("click",getPosts);
})

var BASE_URL = "http://127.0.0.1:8000/";


function getPosts(e,page = 1){
    
    var FULL_URL = BASE_URL+"wp-json/v1/posts?page="+page+"&";

    let perPage = $("#perPage").val();
    let sort = $("#sort").val();
    let getWithCat = $("input[name='getWithCat']").val();
    let getWithCatIsChecked = $("#getWithCat").is(":checked");
    let search = $("#search").val();

    if(perPage || perPage.length != 0){
        FULL_URL+="per_page="+perPage;
    }

    if(sort){
        let sortValues = sort.split("-");
        FULL_URL+="&orderBy="+sortValues[0]+"&order="+sortValues[1];
    }

    if(getWithCatIsChecked){
        FULL_URL+="&include="+getWithCat;
    }

    if(search){
        FULL_URL+="&category="+search;
    }

    $.ajax({
        url : FULL_URL,
        method : "GET",
        data : {},
        success : function(data){
            console.log(data);
            printPosts(data.data);
            printPagination(data.totalPages);
        },
        error : function(xhr){
            console.log(xhr)
        }
    })
}

function printPosts(data){
    let html = ``;
    
    for(let p of data){
        html += `<div class="card col-md-4 my-2 mx-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">${p.title}</h5>
                        <p class="card-text">${p.excerpt}</p>
                        <p class="card-text">Created at: ${p.created_at}</p>`;
                        if(p.categories){
                            html += `<p class="card-text">Categories: <ul>`
                            for(let c of p.categories){
                                html += `<li class="card-text">${c.name}</li>`
                            }
                            html += `</ul></p>`
                        }
                        html += `<a href="#" data-id="${p.id}" class="btn btn-primary">See more</a>
                    </div>
                </div>`;
    }

    $("#items").html(html);
}

function printPagination(pages){
    html=``;

    for(let p=1; p<=pages; p++){
        html+=`<li class="page-item"><a class="page-link" href="#" data-id="${p}">${p}</a></li>`;
    }
    $("#pagination").html(html);
    $(".page-link").on("click",function(e){
        e.preventDefault();
        let page = $(this).data("id");
        getPosts(e,page)
    })
}