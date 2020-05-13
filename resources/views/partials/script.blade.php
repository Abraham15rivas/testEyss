<script>

    //  Products init
    var category_idp
    function showProducts(id_category) 
    {
        axios.get('/api/products/search-all/'+id_category).then( response => {
            
            var data = response.data
            this.category_idp = id_category
            $("#product_tb").remove("tbody");
            data.forEach(product);

        }).catch(e => {
            console.log(e);
        });
    }

    function createProduct()
    {
        let form = $('#product')[0];
        form.reset()
        var button = 
        `<button type="button" class="btn btn-success" data-dismiss="modal" onclick="storeProduct()">Guardar</button>`
        document.getElementById('button').innerHTML = button;
    }

    function storeProduct()
    {
        let form = $('#product')[0];
        
        const params = {
            id: form[0].value,
            name: form[1].value,
            description: form[2].value,
            status: form[3].value,
            category_id: this.category_idp
        }

        axios.post(`/api/products/store`, params)
        .then( response => {
            
            var data = response.data
            $("#product_tb").remove("tbody");
            data.forEach(product);

        }).catch(e => {
            console.log(e);
        });
    }

    function editProduct(id_product) 
    {
        axios.get('/api/products/search/'+id_product).then( response => {
            
            var data = response.data
            $('#id_product').val(data.id)
            $('#name_product').val(data.name)
            $('#description_product').val(data.description)
            $('#status_product').val(data.status)

            var button = 
            `<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="updateProduct()">Actualizar</button>`
            document.getElementById('button').innerHTML = button;

        }).catch(e => {
            console.log(e);
        });
    }

    function updateProduct() 
    {
        let form = $('#product')[0];
        
        const params = {
            id: form[0].value,
            name: form[1].value,
            description: form[2].value,
            status: form[3].value,
            category_id: this.category_idp
        }

        axios.put(`/api/products/update/${params.id}`, params)
        .then( response => {
            
            var data = response.data
            $("#product_tb").remove("tbody");
            data.forEach(product);

        }).catch(e => {
            console.log(e);
        });
    }

    function deleteProduct(id_product) 
    {
        axios.delete('/api/products/delete/'+id_product).then( response => {
            
            var data = response.data
            $("#product_tb").remove("tbody");
            data.forEach(product);

        }).catch(e => {
            console.log(e);
        });
    }
    // Products end
    
    // Categories init
    function editCategory(id_category) 
    {
        axios.get('/api/categories/search/'+id_category).then( response => {
            
            var data = response.data
            $('#id_category').val(data.id)
            $('#name_category').val(data.name)
            $('#description_category').val(data.description)

        }).catch(e => {
            console.log(e);
        });
    }

    function updateCategory() 
    {
        let form = $('#update_category')[0];
        
        const params = {
            id: form[0].value,
            name: form[1].value,
            description: form[2].value
        }

        axios.put(`/api/categories/update/${params.id}`, params)
        .then( response => {
            
            var data = response.data
            $("#category_tb").remove("tbody");
            data.forEach(category);

        }).catch(e => {
            console.log(e);
        });
    }
  
    function deleteCategory(id_category) 
    {
        axios.delete('/api/categories/delete/'+id_category).then( response => {
            
            let data = response.data            
            $("#category_tb").remove("tbody");
            data.forEach(category);

        }).catch(e => {
            console.log(e);
        });
    }
    // categories end

    // Products
    function product(item, index) 
    {
        $("#table_product").append("<tbody id='product_tb'></tbody>");
        var table = 
            `<tr> 
                <td>${index + 1}</td>
                <td class="text-left"><p>${item.name}</p></td>
                <td class="text-left"><p>${item.description}</p></td>
                <td class="text-left"><p>${item.status == 1 ? 'Activo' : 'Desactivo'}</p></td>
                <td class="text-center">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Product" onclick="editProduct(${item.id});">Editar</button>
                    <button type="button" class="btn btn-danger" onclick="deleteProduct(${item.id});">Eliminar</button>
                </td>
            </tr>`
            
        document.getElementById('product_tb').innerHTML += table;
    }
    
    // Categories 
    function category(item, index) 
    {   
        $("#table_category").append("<tbody id='category_tb'></tbody>");
        var table = 
            `<tr> 
                <td>${index + 1}</td>
                <td class="text-left"><p>${item.name}</p></td>
                <td class="text-left"><p>${item.description}</p></td>
                <td class="text-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick="showProducts(${item.id});">Ver productos</button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Category" onclick="editCategory(${item.id});">Editar</button>
                    <button type="button" class="btn btn-danger" onclick="deleteCategory(${item.id});">Eliminar</button>
                </td>
            </tr>`
            
        document.getElementById('category_tb').innerHTML += table;
    }

</script>