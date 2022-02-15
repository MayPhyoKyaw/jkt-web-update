$(document).ready(function() {
    let urlArr = document.referrer.split("/");
    let getFileName = urlArr.pop();
    let getPath = urlArr.pop();
    console.log(urlArr)
    let getId = document.getElementById("some-sch");
    if(getPath === "mm") {
        if(getFileName === "jp-school.php") {
            getId.innerHTML = "ဂျပန်ဘာသာစကား သင်တန်း";
            getId.href = document.referrer;
        } else if(getFileName === "digital-institute.php") {
            getId.innerHTML = "အိုင်တီနည်းပညာ သင်တန်းကျောင်း";
            getId.href = document.referrer;
        }
    } else if(getPath === "jp") {
        if(getFileName === "jp-school.php") {
            getId.innerHTML = "日本語学校";
            getId.href = document.referrer;
        } else if(getFileName === "digital-institute.php") {
            getId.innerHTML = "デジタル学院";
            getId.href = document.referrer;
        }
    } else {
        if(getFileName === "jp-school.php") {
            getId.innerHTML = "Japanese Language School";
            getId.href = document.referrer;
        } else if(getFileName === "digital-institute.php") {
            getId.innerHTML = "Digital Institute";
            getId.href = document.referrer;
        }
    }
})