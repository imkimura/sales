function populateScreen(sellers) {
    for(var seller in sellers) {
        $('#sellers').append(`
        <div class="col-lg-4 row">
            <div>
                <div class="seller-info">
                    <h4 class="name-seller">
                        ${sellers[seller].name}
                    </h4>
                    <p class="mail-seller">
                        ${sellers[seller].email}
                    </p>
                </div>
                <div class="btn-delete">

                    <a class="btn btn-warning" href="/seller/${sellers[seller].id}/" >Edit</a>
                    <a class="btn btn-danger" href="#confirmModal" data-id-seller="${sellers[seller].id}" data-toggle="modal">Delete</a>

                </div>
            </div>
        </div>`)
    }
}

$('#confirmModal').on('show.bs.modal', function(e) {
    var idSeller = $(e.relatedTarget).data('id-seller');
    $('#seller-create').attr('action', '/api/seller/' + idSeller);

});

$(function() {
    $.get('http://127.0.0.1:8000/api/seller', response => {
        populateScreen(response.data)
    });
});

$('#seller-create').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: this.action,
        method: 'POST',
        data: $('#seller-create').serialize(),
        success: function (res) {
            console.log(res)
            window.location.href = '/seller';
        },
        error: function (res) {
            console.log(res)
        }
    });
});

$('#sale-create').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: this.action,
        method: 'POST',
        data: $('#sale-create').serialize(),
        success: function (res) {
            console.log(res)
            window.location.href = '/';
        },
        error: function (res) {
            console.log(res)
        }
    });
});
