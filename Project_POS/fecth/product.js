fetch("http://mylocal.com/pos-system/Project_POS/back_end/tax/read.php")
  // Converting received data to JSON
  .then((response) => response.json())
  .then((json) => {

    let li = `<tr><th>ID</th><th>Name</th><th>User Name</th><th>Email</th> <th>Phone</th><th>Website</th></tr>`;

    for(var key in json.tax){
      for(var key1 in json.tax[key]){
    
        li= `<tr>
          <td>${json.tax[key].id}</td>
          <td>${json.tax[key].name} </td>
          <td>${json.tax[key].tax_amount}</td>
          <td>${json.tax[key].start_date}</td>
          <td>${json.tax[key].end_date}</td>
          <td>
            <button class="btn btn-primary "  data-bs-toggle="modal" data-bs-target="#edit">Edit</button>
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete">Delete</button>


            <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Update Tax Product</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="">
                    <div class="mb-3 row">
                      <label for="inputPassword" class="col-3 col-form-label">Selete Item</label>
                      <div class="col-9">
                        <input class="form-select" aria-label="Default select example" placeholder="Product Name"></>
                      </div>
                    </div>
                    <div class="mb-3 row">
                      <label for="tax_amount" class="col-3 col-form-label"
                        >Tax Amount</label
                      >
                      <div class="col-9">
                        <input
                          type="number"
                          class="form-control"
                          id="tax_amount"
                        />
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="tax_amount" class="col-3 col-form-label"
                        >Start date</label
                      >
                      <div class="col-9">
                        <input
                          type="date"
                          class="form-control"
                          id="tax_amount"
                        />
                      </div>
                    </div>

                    <div class="mb-3 row">
                      <label for="tax_amount" class="col-3 col-form-label"
                        >End date</label
                      >
                      <div class="col-9">
                        <input
                          type="date"
                          class="form-control"
                          id="tax_amount"
                        />
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                  >
                    Close
                  </button>
                  <button type="button" class="btn btn-primary">
                    Save changes
                  </button>
                </div>
              </div>
            </div>
          </div>


          <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Tax Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="">
                  <div class="mb-3 row">
                    <label for="inputPassword" class="col-3 col-form-label">Selete Item</label>
                    <div class="col-9">
                      <input class="form-select" aria-label="Default select example" placeholder="Product Name"></>
                    </div>
                  </div>
                  <div class="mb-3 row">
                    <label for="tax_amount" class="col-3 col-form-label"
                      >Tax Amount</label
                    >
                    <div class="col-9">
                      <input
                        type="number"
                        class="form-control"
                        id="tax_amount"
                      />
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="tax_amount" class="col-3 col-form-label"
                      >Start date</label
                    >
                    <div class="col-9">
                      <input
                        type="date"
                        class="form-control"
                        id="tax_amount"
                      />
                    </div>
                  </div>

                  <div class="mb-3 row">
                    <label for="tax_amount" class="col-3 col-form-label"
                      >End date</label
                    >
                    <div class="col-9">
                      <input
                        type="date"
                        class="form-control"
                        id="tax_amount"
                      />
                    </div>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary"
                  data-bs-dismiss="modal"
                >
                  Close
                </button>
                <button type="button" class="btn btn-primary">
                  Save changes
                </button>
              </div>
            </div>
          </div>
        </div>

          </td>
        </tr>`
        
      }
    // dom display data
    document.getElementById("tax").innerHTML += li;
  }

    
  });
    