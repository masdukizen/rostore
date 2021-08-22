$(document).ready(function () {
    var addBtn, rowcount, tableBody, basePath;

    addBtn = $("#addNew");
    rowcount = $("#autocomplete_table tbody tr").length + 1;
    tableBody = $("#autocomplete_table tbody");
    basePath = $("#base_path").val();

    function formHtml() {
        html = '<tr id="row_' + rowcount + '">';
        html += '<th id="delete_' + rowcount + '" scope="row" class="delete_row">';
        html += '<button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>';
        html += '</th >';
        html += '<th>' + rowcount + '</th>';
        html += '<td>';
        html += '<input type="text" data-field-name="name" class="form-control form-control-sm autocomplete_txt" id="auto_product_' + rowcount + '" name="product[]" autocomplete="off">';
        html += '<input type="hidden" data-field-name="productid" class="form-control form-control-sm autocomplete_txt" id="product_id_' + rowcount + '" name="product_id[]" autocomplete="off">';
        html += '<input type="hidden" data-field-name="price" class="form-control form-control-sm autocomplete_txt" id="price_' + rowcount + '" name="price[]" autocomplete="off">';
        html += '</td >';
        html += '<td>';
        html += '<input type="number" class="form-control form-control-sm" id="qty" name="qty[]" value="1">';
        html += '</td>';
        html += '</tr >';

        rowcount++;
        return html;
    }

    function addNewRow() {
        var html = formHtml();
        console.log(html);

        tableBody.append(html);
    }

    function deleteRow() {
        var id, rowNo;
        id = $(this).attr('id');
        console.log(id);
        idArr = id.split("_");
        console.log(idArr);
        rowNo = idArr[idArr.length - 1];
        console.log(rowNo);
        $("#row_" + rowNo).remove();
    }

    function getId(element) {
        var id, idArr;
        id = element.attr('id');
        idArr = id.split("_");
        return idArr[idArr.length - 1];
    }

    function handleAutocomplete() {
        var fieldName, currentEle;
        currentEle = $(this);

        fieldname = currentEle.data('field-name');
        if (typeof fieldName === 'undefined') {
            return false;
        }

        currentEle.autocomplete({
            source: function (data, cb) {
                $.ajax({
                    url: basePath + 'get-products',
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        name: data.term,
                        fieldName: fieldName
                    },
                    success: function (res) {
                        var result;
                        result = [
                            {
                                label: 'There is no matching record found for ' + data.term,
                                value: ''
                            }
                        ];
                        console.log("before format", res);

                        if (res.length) {
                            result = $.map(res, function (obj) {

                                return {
                                    label: obj[fieldName],
                                    value: obj[fieldName],
                                    data: obj
                                };
                            });
                        }
                        console.log("After format", result);
                        cb(result);
                    }
                });
            },
            autoFocus: true,
            minLength: 1,
            select: function (event, selectedData) {
                console.log(selectedData);
                if (selectedData && selectedData.item && selectedData.item.data) {
                    var rowNo, data;
                    rowNo = getId(currentEle);
                    data = selectedData.item.data;
                    $('#auto_product_' + rowNo).val(data.name);
                    $('#product_id_' + rowNo).val(data.productid);
                    $('#price_' + rowNo).val(data.price);
                }
            }
        });
    }

    function registerEvents() {
        addBtn.on("click", addNewRow);
        $(document).on('click', '.delete_row', deleteRow);
        //register autocomplete events
        $(document).on('focus', '.autocomplete_txt', handleAutocomplete);
    }
    registerEvents();
});