
<form action="" method="post">
    <div >
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <h1>Product Add</h1>
                </div class="container-fluid">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <button type="submit" class="nav-link">Save</button>
                    </li>
                    <li class="nav-item px-2">
                        <button><a  class="nav-link" href="/products">Cancel</a></button>
                    </li>
                </ul>
            </nav>
        </header>
    </div>

    <div class="w-25">

        <div class="mb-3">
            <label class="form-label">sku</label>
            <input type="text" name="sku" class="form-control">
        </div>


        <div class="mb-3">
            <label class="form-label">name</label>
            <input type="text" name="name" class="form-control">
        </div>


        <div class="mb-3">
            <label class="form-label">price</label>
            <input type="number" name="price" class="form-control">
        </div>



        <div class="mb-3">
            <select class="form-select" name="s" aria-label="Default select example " id="form-selector">
                <option selected disabled>Type switcher</option>
                <option value="size" >DVD</option>
                <option value="weight" >Book</option>
                <option value="dimensions" >Furniture</option>
            </select>
        </div>

        <!-- /.mb-3 -->
        <div id="my-forms">
            <div name="size" id="size">

                    <label class="form-label">Size (MB)</label>
                    <input type="number" name="size" class="form-control">

            </div>
            <div name="weight" id="weight">

                    <label class="form-label">Weight (KG)</label>
                    <input type="number" name="weight" class="form-control">

            </div>
            <div name="dimensions" id="dimensions">

                    <label class="form-label">Height (CM)</label>
                    <input type="number" name="height" class="form-control">


                    <label class="form-label">Width (CM)</label>
                    <input type="number" name="width" class="form-control">

                    <label class="form-label">Length (CM)</label>
                    <input type="number" name="length" class="form-control">

            </div>
        </div>
    </div>

    <!--<button type="submit" class="btn btn-primary" id="btn">Submit</button>-->



</form>

