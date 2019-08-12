
$(document).ready(function () {
    $('.date').datepicker({
        dateFormat: "dd/mm/yy"
    });
});


function toDatePicker() {
    $('.date').datepicker({
        dateFormat: "dd/mm/yy"
    });
};

function FocusTabMenu() {

    var url = window.location.pathname;

    switch (url) {
        case "/Home/Index":
            $('#tabHome').addClass('active');
            break;
        case "/Batch/Index":
            $('#tabBatch').addClass('active');
            break;
        case "/Card/Index":
            $('#tabCard').addClass('active');
            break;
        case "/Item/Index":
            $('#tabItem').addClass('active');
            break;
        case "/Order/Index":
            $('#tabOrder').addClass('active');
            break;
        case "/Request/Index":
            $('#tabRequest').addClass('active');
            break;
        case "/Warranty/Index":
            $('#tabWarranty').addClass('active');
            break;
        case "/Point/Index":
            $('#tabPoint').addClass('active');
            break;
        case "/Customer/Index":
            $('#tabCustomer').addClass('active');
            break;
        case "/Message/Chat":
            $('#tabMessage').addClass('active');
            break;
        case "/Config/Index":
            $('#tabConfig').addClass('active');
            break;
        case "/News/Index":
            $('#tabNews').addClass('active');
            break;
        case "/User/Index":
            $('#tabUser').addClass('active');
            break;
        case "/StatisticGift/Index":
            $('#tabStatistic').addClass('active');
            $('#tabStatisticGift').addClass('active');
            break;
        case "/StatisticPoit/Index":
            $('#tabStatistic').addClass('active');
            $('#tabStatisticPoit').addClass('active');
            break;
        case "/StatisticRevenue/Index":
            $('#tabStatistic').addClass('active');
            break;
        default:
            break;
    }

}
