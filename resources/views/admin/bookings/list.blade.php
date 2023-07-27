@extends('admin.layouts.main')
@section('container')
    <style>
        #hvt:hover {
            transform: scale(3.5);
        }
    </style>

    <div class="row">
        @if (Session::has('success') && Session::has('message'))
            <div class="alert alert-{{ Session::get('success') == 'true' ? 'success' : 'danger' }} alert-dismissible fade show"
                role="alert">
                <i class="mdi mdi-check-all me-2"></i>
                {{ Session::get('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="col-md-12 message"></div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>
                        @can('Booking-Create')
                            <h3>
                                <a href="{{ route('booking.add') }}" class="btn btn-xs btn-success float-right add">Add Booking</a>
                            </h3>
                        @endcan
                    </h3>
                    <hr>
                    <table id="booking" class="table table-bordered table-condensed table-striped"
                        style="font-size: small;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Pick Up</th>
                                <th>Drop Off</th>
                                <th>Rider</th>
                                <th>Status</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customScripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            var form = $('.form')
            var btnAdd = $('.add'),
                btnSave = $('.btn-save'),
                btnUpdate = $('.btn-update');
                btnView = $('.btn-view');

            var table = $('#booking').DataTable({
                ajax: route('booking.list'),
                serverSide: true,
                processing: true,
                aaSorting: [
                    [0, "desc"]
                ],
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'pickup',
                        name: 'pickup'
                    },
                    {
                        data: 'dropoff',
                        name: 'dropoff'
                    },
                    {
                        data: 'rider',
                        name: 'rider'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                'createdRow': function(row, data) {
                    $(row).attr('id', data.id)
                },
                "bDestroy": true
            });

            // update ajax
            $(document).on('click', '.btn-view', function() {
                $.ajax({
                    url: route('booking.view'),
                    type: "get",
                    data: {
                        id: $(this).data('id')
                    },
                    success: function(data) {
                        $('#id').html(data.id);
                        $('#name').html(data.name);
                        $('#title').html(data.title);
                        $('#description').html(data.description);
                        // $('#metatitle').html(data.metatitle);
                        // $('#metadesc').html(data.metadesc);
                        let image;
                        if(data?.image) {
                            image = '{{ URL::asset("/") }}' + data.image;
                        } else {
                            image = '{{ URL::asset("backend/assets/img/users/no-image.jpg") }}';

                        }
                        document.getElementById('image').src = image;
                    }
                });
            });

            // delete ajax
            $(document).on('click', '.btn-delete', function() {

                var formData = form.serialize();

                var updateId = form.find('input[name="id"]').val();
                var id = $(this).data('id')
                var el = $(this)
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-success mt-2",
                    cancelButtonClass: "btn btn-danger ms-2 mt-2",
                    buttonsStyling: !1
                }).then(function(t) {
                    if (t.value) {
                        if (!id) return;
                        $.ajax({
                            url: route('booking.remove'),
                            type: "POST",
                            data: {
                                id: id
                            },
                            dataType: 'JSON',

                            success: function(data) {
                                console.log(data);
                                if ($.isEmptyObject(data.error)) {
                                    let table = $('#booking').DataTable();
                                    table.row('#' + id).remove().draw(false)
                                    showMsg("success", data.message);
                                } else {
                                    printErrorMsg(data.error);
                                }
                            }
                        });

                    }

                })
            })
        });   
    </script>
@endpush