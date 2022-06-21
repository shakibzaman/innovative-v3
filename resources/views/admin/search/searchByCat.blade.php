@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            Search
        </div>
        <div class="card-body">
            <div class="form-group ">
                <label for="expense_category">{{ trans('cruds.project.title') }}</label>
                <select name="pro_id" id="pro_id" class="form-control ">
                    <option value=""><---Select---></option>
                    @foreach($projects as $id => $project)

                        <option value="{{$project->id }}" >{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="expense_category">Category</label>
                <select name="cat_id" id="cat_id" class="form-control  category">
                    <option value="">Select Previous</option>
                </select>
            </div>
            <!-- <div class="form-group">
                <label for="expense_amount">Amount</label>
                <input type="text" class="amount" id="amount">
            </div> -->
        </div>
    </div>
    <!-- for datatable -->
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.projectExpense.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Expense">
                    <thead>
                    <tr>

                        <th>
                            {{ trans('cruds.expense.fields.entry_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.projectExpense.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.projectExpense.fields.received') }}
                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(document).on('change','#pro_id',function () {
                //console.log("Is it works");
                var pro_id=$(this).val();
                var div=$(this).parent();
                var op="";
                //console.log(pro_id);
                $.ajax({
                    type:'get',
                    url:'{!! URL::to('admin/findCatName') !!}',
                    data:{'id':pro_id},
                    success:function (data) {
                        console.log('success');
                        // console.log(data);
                        // console.log(data.length);
                        op+='<option value ="" selected disabled>Chose</option>';
                        for(var i=0;i<data.length;i++){
                            op+='<option value ="'+data[i].cat_id+'">'+data[i].name+'</option>';
                        }
                        $('#cat_id').html("");
                        $('#cat_id').append(op);

                    },
                    error:function () {

                    }
                });
            });

            $(document).on('change','#cat_id',function () {
                var exp_id=$(this).val();
                var div=$(this).parent();
                console.log(exp_id);
                var tr="";
                $.ajax({
				type:'get',
				url:'{!!URL::to('admin/findExpName')!!}',
				data:{'id':exp_id},
				dataType:'json',//return data will be json
				success:function(data){
                    //alert( data );
                    //console.log( data );
                    //var decodedData = JSON.parse(data);

                    //console.log( decodedData );
                    $.each(data, function(i, v){
                        //console.log( i);
                        console.log( v);
                        tr+='<tr>';
                        tr+= '<td>'+ v.entry_date +'</td>';
                        tr+= '<td>'+ v.amount +'</td>';
                        tr+= '<td>'+ v.received_by +'</td>';
                        tr+= '</tr>';
                    });

                    // }
                    console.log(tr);
                    $('.datatable-Expense tbody').html('');
                    $('.datatable-Expense tbody').append(tr);
				},
				error:function(){

				}
			});

            });

        });
    </script>

@endsection

@section('scripts')
    @parent
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
                @can('expense_delete')
            let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.expenses.massDestroy') }}",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('{{ trans('global.datatables.zero_selected') }}')

                        return
                    }

                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            $('.datatable-Expense:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection

