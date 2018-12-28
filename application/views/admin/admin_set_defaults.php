<section class="wow fadeIn">
  <div class="card p-3">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col">Type</th>
          <th scope="col">Minimum Amount</th>
          <th scope="col">Maximun Amount</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">Loan</th>
          <td>2,000</td>
          <td>10,000</td>
          <td>
            <button class="btn btn-sm m-0 px-2 btn-info" data-toggle="modal" data-target="#setLoanModal">Update</button>
          </td>
        </tr>

        <tr>
          <th scope="row">Invest</th>
          <td>5,000</td>
          <td>20,000</td>
          <td>
            <button class="btn btn-sm m-0 px-2 btn-info" data-toggle="modal" data-target="#setInvestModal">Update</button>
        </tr>
      </tbody>
    </table>
  </div>

  <div class="card p-3 mt-3 mb-5 table-responsive">
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col"># of month ---></th>
          <th scope="col">one</th>
          <th scope="col">two</th>
          <th scope="col">three</th>
          <th scope="col">four</th>
          <th scope="col">five</th>
          <th scope="col">six</th>
          <th scope="col">seven</th>
          <th scope="col">eight</th>
          <th scope="col">nine</th>
          <th scope="col">ten</th>
          <th scope="col">eleven</th>
          <th scope="col">twelve</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <th scope="row" >Loan Interest Rate</th>
            <td>1%</td>
            <td>2%</td>
            <td>3%</td>
            <td>4%</td>
            <td>5%</td>
            <td>6%</td>
            <td>7%</td>
            <td>8%</td>
            <td>9%</td>
            <td>10%</td>
            <td>11%</td>
            <td>12%</td>
            <td>
              <button type="button" class="btn btn-sm m-0 px-2 btn-info" data-toggle="modal" data-target="#setLoanRateModal">Update</button>
            </td>
          </tr>
          <thead>
            <tr>
              <th scope="col"># of year ---></th>
              <th scope="col" colspan="4" class="text-center">one</th>
              <th scope="col" colspan="4" class="text-center">two</th>
              <th scope="col" colspan="4" class="text-center">three</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tr>
            <th scope="row" >Invest Interest Rate</th>
            <td colspan="4" class="text-center">20%</td>
            <td colspan="4" class="text-center">21%</td>
            <td colspan="4" class="text-center">22%</td>
            <td>
              <button type="button" class="btn btn-sm m-0 px-2 btn-info" data-toggle="modal" data-target="#setInvestRateModal">Update</button>
            </td>
          </tr>

      </tbody>
    </table>
  </div>
</section>


<!-- Modal set loan amount-->
<div class="modal fade" id="setLoanModal" tabindex="-1" role="dialog" aria-labelledby="setLoanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form>
              <div class="modal-header">
                  <h5 class="modal-title h6" id="setLoanModalLabel">Set Loan Amount</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="min_loan_amount" class="form-control">
                    <label for="min_loan_amount" >Minimum loan amount</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="max_loan_amount" class="form-control">
                    <label for="max_loan_amount" >Maximun laon amount</label>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-sm px-2 btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-sm px-3 btn-primary">Save</button>
              </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal set invest amount-->
<div class="modal fade" id="setInvestModal" tabindex="-1" role="dialog" aria-labelledby="setInvestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form>
              <div class="modal-header">
                  <h5 class="modal-title h6" id="setInvestLabel">Set Invest Amount</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="min_invest_amount" class="form-control">
                    <label for="min_invest_amount" >Minimum invest amount</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="max_invest_amount" class="form-control">
                    <label for="max_invest_amount" >Maximun invest amount</label>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-sm px-2 btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-sm px-3 btn-primary">Save</button>
              </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal laon rate-->
<div class="modal fade" id="setLoanRateModal" tabindex="-1" role="dialog" aria-labelledby="setLoanRateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form method="post" action="">
            <div class="modal-header">
                <h5 class="modal-title h6" id="setLoanRateLabel">Set Loan Rates</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <!-- Material input -->
                <div class="row">

                  <div class="col-3">
                    <div class="md-form">
                      <input type="text" id="one_mo" class="form-control">
                      <label for="one_mo" >1 Month</label>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="md-form">
                      <input type="text" id="two_mo" class="form-control">
                      <label for="two_mo" >2 Months</label>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="md-form">
                      <input type="text" id="three_mo" class="form-control">
                      <label for="three_mo" >3 Months</label>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="md-form">
                      <input type="text" id="four_mo" class="form-control">
                      <label for="four_mo" >4 Months</label>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="md-form">
                      <input type="text" id="five_mo" class="form-control">
                      <label for="five_mo" >5 Months</label>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="md-form">
                      <input type="text" id="six_mo" class="form-control">
                      <label for="six_mo" >6 Months</label>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="md-form">
                      <input type="text" id="seven_mo" class="form-control">
                      <label for="seven_mo" >7 Months</label>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="md-form">
                      <input type="text" id="eight_mo" class="form-control">
                      <label for="eight_mo" >8 Months</label>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="md-form">
                      <input type="text" id="nine_mo" class="form-control">
                      <label for="nine_mo" >9 Months</label>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="md-form">
                      <input type="text" id="ten_mo" class="form-control">
                      <label for="ten_mo" >10 Months</label>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="md-form">
                      <input type="text" id="eleven_mo" class="form-control">
                      <label for="eleven_mo" >11 Months</label>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="md-form">
                      <input type="text" id="twelve_mo" class="form-control">
                      <label for="twelve_mo" >12 Months</label>
                    </div>
                  </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm px-2 btn-danger" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm px-3 btn-primary">Save</button>
            </div>
          </form>
        </div>
    </div>
</div>


<!-- Modal set invest amount-->
<div class="modal fade" id="setInvestRateModal" tabindex="-1" role="dialog" aria-labelledby="setInvestRateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form>
              <div class="modal-header">
                  <h5 class="modal-title h6" id="setInvestRateLabel">Set Invest Rates</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="one_year" class="form-control">
                    <label for="one_year" >One year</label>
                </div>
                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="two_year" class="form-control">
                    <label for="two_year" >Two years</label>
                </div>

                <!-- Material input -->
                <div class="md-form">
                    <input type="text" id="three_year" class="form-control">
                    <label for="three_year" >Three years</label>
                </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-sm px-2 btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-sm px-3 btn-primary">Save</button>
              </div>
            </form>
        </div>
    </div>
</div>