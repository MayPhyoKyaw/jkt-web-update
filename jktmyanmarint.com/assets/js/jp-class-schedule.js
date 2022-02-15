$(document).ready(function() {
    $(".detail").click(function () {
        $("#modal_days").html('');
        var rowId = $(this).parent().parent().attr('id');
        console.log(rowId);
        // var days = $(this).closest("tr").find(".days"); 
        var data = document.getElementById(rowId).querySelectorAll(".row-data");
        // var section_hour = $(this).closest("tr").find(".section-hour");
        var sections = $(this).closest("tr").find(".sections");
        console.log(data)
        let category_title = data[0].innerHTML;
        let type_title = data[1].innerHTML;
        let course_level = data[2].innerHTML;
        let instructor = data[3].innerHTML;
        let services = data[4].innerHTML;
        let discount_percent = data[5].innerHTML;
        let origin_price = data[6].innerHTML;
        let description = data[7].innerHTML;
        let course_title = data[8].innerHTML;
        // let section_hour = data[9].innerHTML;
        let start_date = data[9].innerHTML;
        let duration = data[10].innerHTML;

        $("#modal_course_title").text(course_title);
        $("#modal_category_title").text(category_title);
        $("#modal_level").text(course_level);
        $("#modal_type_title").text(type_title);
        // $("#modal_time").addClass('modal-time-badges section-hour').text(section_hour);
        if(instructor !== '') {
            $("#modal_instructor").addClass('modal-time-badges instructor').text(instructor);
        } else {
            $("#modal_instructor").text("-");
        }
        // $("#modal_fees").text(origin_price);
        $("#modal_duration").text(duration);
        start_date = start_date === '' ? '-' : start_date;
        $("#modal_start_date").text(start_date);
        $("#modal_services").text(services);
        description = description === '' ? '-' : description;
        $("#modal_description").text(description);
        // console.log(origin_price)

        let salePrice = origin_price - (origin_price * discount_percent/100);
        // console.log(salePrice)

        if(discount_percent <= 0) {
            $("#modal_fees").text(new Intl.NumberFormat().format(origin_price));
        } else {
            $("#modal_fees").html(`
                <span class="sale-price">${new Intl.NumberFormat().format(origin_price)}</span> &nbsp;${new Intl.NumberFormat().format(salePrice)}
            `)
        }
        console.log(sections[0])
        let modal_sections = sections[0].cloneNode(true);
        $("#modal_days_time").html(``);
        console.log(modal_sections);
        $("#modal_days_time").addClass("modal_days_time").append(modal_sections);

        let encryptedCourseId = data[11].innerHTML;
        let getUrl = window.location.href;
        var arr = getUrl.split('/');
        arr.pop();
        let url = arr.join('/');
        $("#modalEnroll").click(function() {
            window.location = `${url}/classEnroll.php?courseId=${encryptedCourseId}`;
        })

            // console.log(days, days.length)
            // for(let i=0; i<days.length; i++) {
            //     let day = days[i].innerHTML; 
            //     let badges;
            //     console.log(i, day)
            //     switch(day) {
            //         case "Sa":
            //         case "Su":
            //             badges = "weekend";
            //             break;
            //         default:
            //             badges = "weekday";                          
            //       }
            //     let append_day_modal = `<span class="${badges} modal-days-badges">${day}</span>`
            //     $("#modal_days").append(append_day_modal);
            // } 

    })
})