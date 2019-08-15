$(document).ready(function () {
    loadListBranch();
    $('.date').datepicker();
});

//Tạo Giảng Viên
function createBranch() {
    $("#frmcreateBranch").validate({
        ignore: ".date",
        rules: {
            name: {
                required: true,
            },
            phone: {
                required: true,
                number: true,
                minlength: 10
            },
            mail: {
                required: true,
                email: true
            },
            address: {
                required: true
            },
            introduct: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Vui lòng không để trống"
            },
            phone: {
                required: "Vui lòng không để trống",
                number: "Vui lòng nhập số",
                minlength: "SĐT phải có ít nhất 10 chữ số"
            },
            mail: {
                required: "Vui lòng không để trống",
                email: "email phải đúng định dạng"
            },
            address: {
                required: "Vui lòng không để trống"
            },
            introduct: {
                required: "Vui lòng không để trống"
            }
        },
        submitHandler: function () {
            $.ajax({
                type: 'POST',
                url: '../../../../btlweb/admin/controller/branch/createBranch.php',
                data: $("#frmcreateBranch").serialize(),
                success: function (result) {
                    if (result == 1) {
                        swal("Thông báo", "Tạo mới thành công", "success");
                        $('#createBranch').modal('hide');
                        loadListBranch();
                        resetTextBranch();
                    }
                    else {
                        swal("Lỗi", "Tạo mới thất bại", "warning");
                    }
                }
            });
        }
    });
}

//Tìm kiếm ngành
function loadListBranch() {
    var name = $.trim($('#txtnameBranch').val());
    var phone = $.trim($('#txtphoneBranch').val());
    $.ajax({
        url: '../../../../btlweb/admin/controller/branch/loadListBranch.php',
        type: 'POST',
        data: { name: name, phone: phone },
        success: function (result) {
            $('#_tableBranch').html(result);
        }
    });
}

//Load thông tin nganhhf cần sửa lên form
function loadinfoBranch($id) {
    $.ajax({
        type: 'POST',
        url: '../../../../btlweb/admin/controller/branch/loadinfoBranch.php',
        data: { id: $id },
        success: function (result) {
            $('#_popupEditBranch').html(result);
            $('#editBranch').modal('show');
            toDatePicker();
        }
    });
}
//reset input in form Branch
function resetTextBranch() {
    $('#name').val("");
    $('#phone').val("");
    $('#mail').val("");
    $('#address').val("");
    $('#introduct').val("");
}

//Show ra popup Sửa ngành
function openModalBranch($id) {
    loadinfoBranch($id);
}
//Lưu lại thông tin cập nhập của ngành
function saveEditBranch() {
    $('#frmeditBranch').validate({
        ignore: ".date",
        rules: {
            _name: {
                required: true,
            },
            _phone: {
                required: true,
                number: true,
                minlength: 10
            },
            _mail: {
                required: true,
                email: true
            },
            _address: {
                required: true
            },
            _introduct: {
                required: true,
            }
        },
        messages: {
            _name: {
                required: "Vui lòng không để trống"
            },
            _phone: {
                required: "Vui lòng không để trống",
                number: "Vui lòng nhập số",
                minlength: "SĐT phải có ít nhất 10 chữ số"
            },
            _mail: {
                required: "Vui lòng không để trống",
                email: "email phải đúng định dạng"
            },
            _address: {
                required: "Vui lòng không để trống"
            },
            _introduct: {
                required: "Vui lòng không để trống"
            }
        },
        submitHandler: function () {
            $.ajax({
                url: '../../../../btlweb/admin/controller/branch/saveEditBranch.php',
                type: 'POST',
                data: $('#frmeditBranch').serialize(),
                success: function (result) {
                    if (result == 1) {
                        swal("Thông báo", "Cập nhập thành công!", "success");
                        loadListBranch();
                        $("#editBranch").modal('hide');
                    }
                    else {
                        swal("Lỗi", "Cập nhập thất bại!", "warning");
                    }
                }
            });
        }
    });
}


function deleteBranch($id) {
    $.ajax({
        type: 'POST',
        url: '../../../../btlweb/admin/controller/branch/deleteBranch.php',
        data: { id: $id },
        success: function (result) {
            if (result == 1) {
                swal("Thông báo", "Xóa thành công!", "success");
                loadListBranch();
            } else {
                swal("Lỗi", "Xóa thất bại", "warning");
            }
        }
    });
}

/*Module Leturer */

function resetTextLecturer() {
    $('#name').val("");
    $('#phone').val("");
    $('#email').val("");
    $('#address').val("");
    $('#workplace').val("");
    $('#introduct').val("");
    $('#file').val("");
}


function loadListLecturer() {
    $name = $.trim($('#txtnameLecturer').val());
    $phone = $.trim($('#txtphoneLecturer').val());
    $level = $.trim($('#level').val());
    $branchList = $.trim($('#branchList').val());
    $.ajax({
        type: 'POST',
        url: '../../../../btlweb/admin/controller/lecturer/loadListLecturer.php',
        data: {
            name: $name,
            phone: $phone,
            level: $level,
            branchList: $branchList
        },
        success: function (result) {
            $('#_tableLecturer').html(result);
        }
    });
}

function createLecturer() {
    $('#frmcreateLecturer').validate({
        ignore: ".date",
        rules: {
            name: {
                required: true,
            },
            phone: {
                required: true,
                number: true,
                minlength: 10
            },
            email: {
                required: true,
                email: true
            },
            address: {
                required: true
            },
            workplace: {
                required: true
            },
            introduct: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Vui lòng không để trống"
            },
            phone: {
                required: "Vui lòng không để trống",
                number: "Vui lòng nhập số",
                minlength: "SĐT phải có ít nhất 10 chữ số"
            },
            email: {
                required: "Vui lòng không để trống",
                email: "email phải đúng định dạng"
            },
            address: {
                required: "Vui lòng không để trống"
            },
            workplace: {
                required: "Vui lòng không để trống"
            },
            introduct: {
                required: "Vui lòng không để trống"
            }
        },
        submitHandler: function () {
            $.ajax({
                type: "POST",
                contentType: false,
                processData: false,
                url: '../../../../btlweb/admin/controller/lecturer/createLecturer.php',
                data: new FormData($('#frmcreateLecturer')[0]),
                success: function (result) {
                    if (result == 1) {
                        swal("Thông báo", "Tạo mới thành công", "success");
                        $('#createLecturer').modal('hide');
                        loadListLecturer();
                        resetTextLecturer();
                    }
                    else {
                        swal("Lỗi", "Tạo mới thất bại", "warning");
                    }
                }
            });
        }
    });
}

function loadinfoLecturer($id) {
    $.ajax({
        type: 'POST',
        url: '../../../../btlweb/admin/controller/lecturer/loadinfoLecturer.php',
        data: { id: $id },
        success: function (result) {
            $('#_popupEditLecturer').html(result);
            $('#editLecturer').modal('show');
            toDatePicker();
        }
    });
}

function openModalLecturer($id) {
    loadinfoLecturer($id);
}

function saveEditLecturer() {
    $('#frmeditLecturer').validate({
        ignore: ".date",
        rules: {
            name: {
                required: true,
            },
            phone: {
                required: true,
                number: true,
                minlength: 10
            },
            email: {
                required: true,
                email: true
            },
            address: {
                required: true
            },
            workplace: {
                required: true
            },
            introduct: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Vui lòng không để trống"
            },
            phone: {
                required: "Vui lòng không để trống",
                number: "Vui lòng nhập số",
                minlength: "SĐT phải có ít nhất 10 chữ số"
            },
            email: {
                required: "Vui lòng không để trống",
                email: "email phải đúng định dạng"
            },
            address: {
                required: "Vui lòng không để trống"
            },
            workplace: {
                required: "Vui lòng không để trống"
            },
            introduct: {
                required: "Vui lòng không để trống"
            }
        },
        submitHandler: function () {
            $.ajax({
                url: '../../../../btlweb/admin/controller/lecturer/saveEditLecturer.php',
                type: 'POST',
                contentType: false,
                processData: false,
                data: new FormData($('#frmeditLecturer')[0]),
                success: function (result) {
                    if (result == 1) {
                        swal("Thông báo", "Cập nhập thành công!", "success");
                        loadListLecturer();
                        $("#editLecturer").modal('hide');
                    }
                    else {
                        swal("Lỗi", "Cập nhập thất bại!", "warning");
                    }
                }
            });
        }
    });
}

function deleteLecturer($id) {
    $.ajax({
        type: 'POST',
        url: '../../../../btlweb/admin/controller/lecturer/deleteLecturer.php',
        data: { id: $id },
        success: function (result) {
            if (result == 1) {
                swal("Thông báo", "Xóa thành công!", "success");
                loadListLecturer();
            } else {
                swal("Lỗi", "Xóa thất bại", "warning");
            }
        }
    });
}

//Module Tin tưc
function loadListNews() {
    $title = $.trim($('#txtTitle').val());
    $branch_id = $.trim($('#_branchList').val());
    $.ajax({
        url: '../../../../btlweb/admin/controller/news/loadListNews.php',
        type: 'POST',
        data: { title: $title, branch_id: $branch_id },
        success: function (result) {
            $('#_tableNews').html(result);
        }
    });
}

function resetTextNews() {
    $('#title').val("");
    $('#content').val("");
}

function createNews() {
    $("#frmcreateNews").validate({
        rules: {
            title: {
                required: true,
            },
            content: {
                required: true,
            }
        },
        messages: {
            title: {
                required: "Vui lòng không để trống"
            },
            content: {
                required: "Vui lòng không để trống"
            }
        },
        submitHandler: function () {
            $.ajax({
                type: 'POST',
                contentType: false,
                processData: false,
                url: '../../../../btlweb/admin/controller/news/createNews.php',
                data: new FormData($("#frmcreateNews")[0]),
                success: function (result) {
                    if (result == 1) {
                        swal("Thông báo", "Tạo mới thành công", "success");
                        $('#createNews').modal('hide');
                        loadListNews();
                        resetTextNews();
                    }
                    else {
                        swal("Lỗi", "Tạo mới thất bại", "warning");
                    }
                }
            });
        }
    });
}

function loadinfoNews($id) {
    $.ajax({
        type: 'POST',
        url: '../../../../btlweb/admin/controller/news/loadinfoNews.php',
        data: { id: $id },
        success: function (result) {
            $('#_popupEditNews').html(result);
            $('#editNews').modal('show');
        }
    });
}

function openModalNews($id) {
    loadinfoNews($id);
}

function saveEditNews() {
    $("#frmeditNews").validate({
        rules: {
            _title: {
                required: true,
            },
            _content: {
                required: true,
            }
        },
        messages: {
            _title: {
                required: "Vui lòng không để trống"
            },
            _content: {
                required: "Vui lòng không để trống"
            }
        },
        submitHandler: function () {
            $.ajax({
                type: 'POST',
                contentType: false,
                processData: false,
                url: '../../../../btlweb/admin/controller/news/saveEditNews.php',
                data: new FormData($("#frmeditNews")[0]),
                success: function (result) {
                    if (result == 1) {
                        swal("Thông báo", "Sửa thành công", "success");
                        $('#editNews').modal('hide');
                        loadListNews();
                    }
                    else {
                        swal("Lỗi", "Cập nhập thất bại", "warning");
                    }
                }
            });
        }
    });
}


function deleteNews($id) {
    $.ajax({
        type: 'POST',
        url: '../../../../btlweb/admin/controller/news/deleteNews.php',
        data: { id: $id },
        success: function (result) {
            if (result == 1) {
                swal("Thông báo", "Xóa thành công!", "success");
                loadListNews();
            } else {
                swal("Lỗi", "Xóa thất bại", "warning");
            }
        }
    });
}

//Module Tai lieu CNTT
function loadListDocument() {
    $name = $.trim($('#txtnameDocument').val());
    $branch_id = $.trim($('#_branchListDoc').val());
    $.ajax({
        url: '../../../../btlweb/admin/controller/document/loadListDocument.php',
        type: 'POST',
        data: { name: $name, branch_id: $branch_id },
        success: function (result) {
            $('#_tableDocument').html(result);
        }
    });
}

function resetTextDocument() {
    $('#name').val("");
    $('#link').val("");
    $('#image').val("");
}


// processData: set False nếu không muốn dữ liệu được truyền vào data sẽ được xử lý thành query kiểu chuỗi trước khi đẩy nên server,
//contentType: Kiểu nội dung dữ liệu được gủi nên sever set false để multipart/form-data được gọi để có thể upload File ,
function createDocument() {
    $("#frmcreateDocument").validate({
        rules: {
            name: {
                required: true
            },
            link: {
                required: true
            }
        },
        messages: {
            name: {
                required: "Vui lòng không để trống"
            },
            link: {
                required: "Vui lòng không để trống"
            }
        },
        submitHandler: function () {
            $.ajax({
                type: 'POST',
                processData: false,
                contentType: false,
                url: '../../../../btlweb/admin/controller/document/createDocument.php',
                data: new FormData($('#frmcreateDocument')[0]),
                success: function (result) {
                    if (result == 1) {
                        swal("Thông báo", "Tạo mới thành công", "success");
                        $('#createDocument').modal('hide');
                        loadListDocument();
                        resetTextDocument();
                    }
                    else {
                        swal("Lỗi", "Tạo mới thất bại", "warning");
                    }
                }
            });
        }
    });
}
function openModalDocument($id) {
    loadinfoDocument($id);
}

function loadinfoDocument($id) {
    $.ajax({
        type: 'POST',
        url: '../../../../btlweb/admin/controller/document/loadinfoDocument.php',
        data: { id: $id },
        success: function (result) {
            $('#_popupEditDocument').html(result);
            $('#editDocument').modal('show');
        }
    });
}

function saveEditDocument() {
    var id = $('#_id').val();
    var name = $('#_name').val();
    var link = $('#_link').val();
    var image = $('#_image').val();
    var branch_id = $('#_p_branchList').val();
    $("#frmeditDocument").validate({
        rules: {
            _name: {
                required: true
            },
            _link: {
                required: true
            }
        },
        messages: {
            _name: {
                required: "Vui lòng không để trống"
            },
            _link: {
                required: "Vui lòng không để trống"
            }
        },
        submitHandler: function () {
            $.ajax({
                type: 'POST',
                url: '../../../../btlweb/admin/controller/document/saveEditDocument.php',
                data: { name: name, link: link, branch_id: branch_id, image: image, id: id },
                success: function (result) {
                    if (result == 1) {
                        swal("Thông báo", "Sửa thành công", "success");
                        $('#editDocument').modal('hide');
                        loadListDocument();
                        resetTextDocument();
                    }
                    else {
                        swal("Lỗi", "Cập nhập thất bại", "warning");
                    }
                }
            });
        }
    });
}

function deleteDocument($id) {
    $.ajax({
        type: 'POST',
        url: '../../../../btlweb/admin/controller/document/deleteDocument.php',
        data: { id: $id },
        success: function (result) {
            if (result == 1) {
                swal("Thông báo", "Xóa thành công!", "success");
                loadListDocument();
            } else {
                swal("Lỗi", "Xóa thất bại", "warning");
            }
        }
    });
}

//Modul Bai báo khoa hoc
function resetTextArticle() {
    $('#title').val("");
    $('#content').val("");
}

function loadListArticle() {
    var title = $('#txttitleArticle').val();
    var lecturer_id = $('#lecturer').val();
    $.ajax({
        url: '../../../../btlweb/admin/controller/article/loadListArticle.php',
        type: 'POST',
        data: { title: title, lecturer_id: lecturer_id },
        success: function (result) {
            $('#_tableArticle').html(result);
        }
    });
}

function createArticle() {
    $("#frmcreateArticle").validate({
        rules: {
            title: {
                required: true,
            },
            content: {
                required: true,
            }
        },
        messages: {
            title: {
                required: "Vui lòng không để trống"
            },
            content: {
                required: "Vui lòng không để trống"
            }
        },
        submitHandler: function () {
            $.ajax({
                type: 'POST',
                contentType: false,
                processData: false,
                url: '../../../../btlweb/admin/controller/article/createArticle.php',
                data: new FormData($("#frmcreateArticle")[0]),
                success: function (result) {
                    if (result == 1) {
                        swal("Thông báo", "Tạo mới thành công", "success");
                        $('#createArticle').modal('hide');
                        loadListArticle();
                        resetTextArticle();
                    }
                    else {
                        swal("Lỗi", "Tạo mới thất bại", "warning");
                    }
                }
            });
        }
    });
}

function openModalArticle($id) {
    loadinfoArticle($id);
}

function loadinfoArticle($id) {
    $.ajax({
        type: 'POST',
        url: '../../../../btlweb/admin/controller/article/loadinfoArticle.php',
        data: { id: $id },
        success: function (result) {
            $('#_popupEditArticle').html(result);
            $('#detailArticle').modal('show');
        }
    });
}


function deleteArticle($id) {
    $.ajax({
        type: 'POST',
        url: '../../../../btlweb/admin/controller/article/deleteArticle.php',
        data: { id: $id },
        success: function (result) {
            if (result == 1) {
                swal("Thông báo", "Xóa thành công!", "success");
                loadListArticle();
            } else {
                swal("Lỗi", "Xóa thất bại", "warning");
            }
        }
    });
}

//Module ACCOUNT

function loadListAccount() {
    $name = $.trim($('#txtnameAccount').val());
    $.ajax({
        url: '../../../../btlweb/admin/controller/account/loadListAccount.php',
        type: 'POST',
        data: { name: $name },
        success: function (result) {
            $('#_tableAccount').html(result);
        }
    });
}

function resetTextAccount() {
    $('#name').val('');
    $('#pass').val('');
    $('#email').val('');
    $('#address').val('');
}

function createAccount() {
    $("#frmcreateAccount").validate({
        rules: {
            name: {
                required: true,
            },
            pass: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            address: {
                required: true,
            }
        },
        messages: {
            name: {
                required: "Vui lòng không để trống"
            },
            pass: {
                required: "Vui lòng không để trống"
            },
            email: {
                required: "Vui lòng không để trống",
                email: "email không hợp lệ",
            },
            address: {
                required: "Vui lòng không để trống",
            }
        },
        submitHandler: function () {
            $.ajax({
                type: 'POST',
                url: '../../../../btlweb/admin/controller/account/createAccount.php',
                data: $("#frmcreateAccount").serialize(),
                success: function (result) {
                    if (result == 1) {
                        swal("Thông báo", "Tạo mới thành công", "success");
                        $('#createAccount').modal('hide');
                        loadListAccount();
                        resetTextAccount();
                    }
                    else {
                        swal("Lỗi", "Tạo mới thất bại", "warning");
                    }
                }
            });
        }
    });
}

function openModalAccount($id) {
    loadinfoAccount($id);
}

function loadinfoAccount($id) {
    $.ajax({
        type: 'POST',
        url: '../../../../btlweb/admin/controller/account/loadinfoAccount.php',
        data: { id: $id },
        success: function (result) {
            $('#_popupEditAccount').html(result);
            $('#editAccount').modal('show');
        }
    });
}

function saveEditAccount() {
    $("#frmeditAccount").validate({
        rules: {
            _name: {
                required: true,
            },
            _pass: {
                required: true,
            },
            _email: {
                required: true,
                email: true,
            },
            _address: {
                required: true,
            }
        },
        messages: {
            _name: {
                required: "Vui lòng không để trống"
            },
            _pass: {
                required: "Vui lòng không để trống"
            },
            _email: {
                required: "Vui lòng không để trống",
                email: "email không hợp lệ",
            },
            _address: {
                required: "Vui lòng không để trống",
            }
        },
        submitHandler: function () {
            $.ajax({
                type: 'POST',
                url: '../../../../btlweb/admin/controller/account/saveEditAccount.php',
                data: $("#frmeditAccount").serialize(),
                success: function (result) {
                    if (result == 1) {
                        swal("Thông báo", "Sửa thành công", "success");
                        loadListAccount();
                        $("#editAccount").modal('hide');
                    }
                    else {
                        swal("Lỗi", "Cập nhập thất bại", "warning");
                    }
                }
            });
        }
    });
}

function deleteAccount($id) {
    $.ajax({
        type: 'POST',
        url: '../../../../btlweb/admin/controller/account/deleteAccount.php',
        data: { id: $id },
        success: function (result) {
            if (result == 1) {
                swal("Thông báo", "Xóa thành công!", "success");
                loadListAccount();
            } else {
                swal("Lỗi", "Xóa thất bại", "warning");
            }
        }
    });
}


function redirectBranch() {
    $.ajax({
        type: 'GET',
        url: '../../../../btlweb/admin/controller/branch/redirectIndex.php',
        success: function (result) {
            $('#index').html(result);
            loadListBranch();
        }
    });
}

function redirectLecturer() {
    $.ajax({
        type: 'GET',
        url: '../../../../btlweb/admin/controller/lecturer/redirectIndex.php',
        success: function (result) {
            $('#index').html(result);
            loadListLecturer();
            $('#branchList').on('change', loadListLecturer);
            $('#level').on('change', loadListLecturer);
        }
    });
}

function redirectNews() {
    $.ajax({
        type: 'GET',
        url: '../../../../btlweb/admin/controller/news/redirectIndex.php',
        success: function (result) {
            $('#index').html(result);
            loadListNews();
            $('#_branchList').on('change', loadListNews);
        }
    });
}

function redirectDocument() {
    $.ajax({
        type: 'GET',
        url: '../../../../btlweb/admin/controller/document/redirectIndex.php',
        success: function (result) {
            $('#index').html(result);
            loadListDocument();
            $('#_branchListDoc').on('change', loadListDocument);
        }
    });
}

function redirectArticle() {
    $.ajax({
        type: 'GET',
        url: '../../../../btlweb/admin/controller/article/redirectIndex.php',
        success: function (result) {
            $('#index').html(result);
            loadListArticle();
            $('#lecturer').on('change', loadListArticle);
        }
    });
}

function redirectAccount() {
    $url = 'account.php'
    $.ajax({
        type: 'GET',
        url: '../../../../btlweb/admin/controller/account/redirectIndex.php',
        data: { account: $url },
        success: function (result) {
            $('#index').html(result);
            loadListAccount();
        }
    });
}