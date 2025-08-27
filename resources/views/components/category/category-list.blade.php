<div class="container-fluid">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Category</h4>
                </div>
                <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
                </div>
            </div>
            <hr class="bg-secondary"/>
            <div class="table-responsive">
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>No</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tableList">

                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>

<!-- <script>
    // Page load e category list fetch korbe
    getList();

    async function getList(){
        showLoader();

        try {
            let res = await axios.get("/category-list");
            hideLoader();

            let tableList = $("#tableList");
            let tableData = $("#tableData");

            // DataTable destroy & table empty
            if ($.fn.DataTable.isDataTable('#tableData')) {
                tableData.DataTable().destroy();
            }
            tableList.empty();

            // Array ta extract kora
            let categories = res.data.data; 

            // Populate table
            categories.forEach(function(item, index){
                let row = `<tr>
                                <td>${index + 1}</td>
                                <td>${item.name}</td>
                                <td>
                                    <button data-id="${item.id}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                                    <button data-id="${item.id}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                                </td>
                            </tr>`;
                tableList.append(row);
            });

            // Edit button click
            $('.editBtn').on('click', async function(){
                let id = $(this).data('id');
                await FillUpdateForm(id);  // Make sure FillUpdateForm function exists
                $("#update-modal").modal('show');
            });

            // Delete button click
            $('.deleteBtn').on('click', function(){
                let id = $(this).data('id');
                $("#delete-modal").modal('show');
                $("#deleteID").val(id);
            });

            // Initialize DataTable
            new DataTable('#tableData',{
                order: [[0, 'asc']],
                lengthMenu: [5,10,15,20,100]
            });

        } catch (err) {
            hideLoader();
            console.error("Error fetching category list:", err);
            errorToast("Failed to fetch categories");
        }
    }
</script> -->


<script>

    getList();
    async function getList(){
        showLoader();
        let res = await axios.get("/category-list");
        hideLoader();

        let tableList = $("#tableList");
        let tableData = $("#tableData");

        tableData.DataTable().destroy();
        tableList.empty();
        
        res.data.forEach(function (item,index){
            let row = `<tr>
                            <td>${index+1}</td>
                            <td>${item['name']} </td>
                            <td>
                                <button data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-success">Edit</button>
                                <button data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </tr>`
            tableList.append(row)
        })

        $('.editBtn').on('click',async function(){
            let id = $(this).data('id');
            await FillUpdateForm(id);
            $("#update-modal").modal('show');

        })

        $('.deleteBtn').on('click',async function(){
            let id = $(this).data('id');
            $("#delete-modal").modal('show');
            $("#deleteID").val(id);
        })

        new DataTable('#tableData',{
            order:[[0,'asc']],
            lengthMenu:[5,10,15,20,100]
        });

    }
</script>
