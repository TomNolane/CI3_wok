//===== Written by gor-sargsyan.info =====//

//-----------------------Initializing--------------------------
$(document).ready(function () {
    //-----------------------Declaration of variables--------------------------
    var currentLoanSize = 20000,
        range = $("#rangeSlider"),
        commissionPercantage = 13,
        rangeUpperValue = $('.ex-slider-val'),
        rangeTableValue = $('.ex-current-val'),
        timeTable = $('.ex-time'),
        commissionTableSize = $('.ex-Commission'),
        returnTable = $('.ex-total'),
        probabilityTable = $('.irs-single'),
        probabilityTable2 = $('.ex-prob'),
        probability = 95,
        commission = (currentLoanSize * commissionPercantage) / 100,
        returnTotal = currentLoanSize + commission,
        setDynamicProbability = function () {
            if (currentLoanSize >= 30000 && currentLoanSize < 50000) {
                probability = 85;
                probabilityTable.text("вероятность " + probability).append('%');
                probabilityTable2.html("<span>" + probability + "%</span>");
            } else if (currentLoanSize >= 50000 && currentLoanSize < 80000) {
                probability = 77;
                probabilityTable.text("вероятность " + probability).append('%');
                probabilityTable2.html("<span>" + probability + "%</span>");
            } else if (currentLoanSize >= 80000) {
                probability = 65;
                probabilityTable.text("вероятность " + probability).append('%');
                probabilityTable2.html("<span>" + probability + "%</span>");
            }
            else if (currentLoanSize <= 25000) {
                probability = 95;
                probabilityTable.text("вероятность " + probability).append('%');
                probabilityTable2.html("<span>" + probability + "%</span>");
            }
        };
    //------------------------Declaration of variables end-------------------------
    rangeUpperValue.append("<span>" + currentLoanSize.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + "</span><span> &#8381;</span>");
    rangeTableValue.append("<span>" + currentLoanSize.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + " рублей</span>");
    commissionTableSize.append("<span>" + commission.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + " </span><span> &#8381;</span>");
    returnTable.append("<span>" + returnTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ") + " рублей</span>");
    probabilityTable.text('').append("<span>вероятность " + probability + "%</span>");
    probabilityTable2.text('').append("<span>" + probability + "%</span>");
    //-------------------Use this function to get and set range slider current value----------------------//
    range.on("change", function () {
        probabilityTable.css('margin-left', '0');
        currentLoanSize = parseInt($(this).prop("value"));
        commission = (currentLoanSize * commissionPercantage) / 100;
        returnTotal = currentLoanSize + commission;
        var currentLoanToShow = currentLoanSize.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " "),
            commissionToShow = commission.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " "),
            totalToShow = returnTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        rangeUpperValue.html("<span>" + currentLoanToShow + "</span><span> &#8381;</span>");
        rangeTableValue.html("<span>" + currentLoanToShow + " рублей</span>");
        commissionTableSize.html("<span>" + commissionToShow + "</span><span> &#8381;</span>");
        returnTable.html("<span>" + totalToShow + " рублей</span>");
        setDynamicProbability();
    });
});


//-----------------------Time slider--------------------------
var current2 = '100-130 дней',
    range2 = $("#rangeSlider2"),
    rangeUpperValue2 = $('.ex-slider-val-2'),
    time;
setDynamicTimePeriod = function () {
    if (current2 <= 61) {
        time = '61-100 дней';
        rangeUpperValue2.html("<span>" + time + "</span>");
    }
    if (current2 > 61 && current2 <= 130) {
        time = '100-130 дней';
        rangeUpperValue2.html("<span>" + time + "</span>");
    }
    if (current2 > 130 && current2 <= 200) {
        time = '130-200 дней';
        rangeUpperValue2.html("<span>" + time + "</span>");
    }
    if (current2 > 200 && current2 <= 250) {
        time = '250-365 дней';
        rangeUpperValue2.html("<span>" + time + "</span>");
    }
};

rangeUpperValue2.append("<span>" + current2 + "</span>");
$(document).ready(function () {
    //-------------------Use this function to get and set range time sliders current values----------------------//

    range2.on("change", function () {
        current2 = $(this).prop("value");
        setDynamicTimePeriod();
    });
});