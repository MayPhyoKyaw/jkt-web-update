function filterByTimePending(e) {
  $(".payment-block").html(``);
  // console.log(typeof e.target.value);
  // console.log(e.target.value);
  $.post(
    "filterPayment.php",
    {
      filteredByTime: e.target.value,
      filteredByBanking: $("#filterByPayment").val(),
      is_pending: 1,
    },
    function (data) {
      // console.log("data is " + data.length);
      // console.log(data);
      let renderData = ``;
      if (data[0] == null || data.length == 0) {
        renderData = `
        <div class="col-12 p-2 no-data">
            There is no data.
        </div>
      `;
      } else {
        for (var i in data) {
          // if (!data[i]) {
          // } else {
          let course = data[i].level_or_sub
            ? data[i].title + " - " + data[i].level_or_sub
            : data[i].title;
          renderData += `
                        <div class="col-12 col-lg-6 p-2">
                            <div class="card card-block shadow mb-3 px-3 pt-3">
                                <div class="row my-3">
                                    <div class="transaction-label col-6">Transaction ID : </div>
                                    <div class="transaction-data col-6">${data[i].payment_id}</div>
                                </div>
                                <div class="row my-3">
                                    <div class="transaction-label col-6">Registered Student Name : </div>
                                    <div class="transaction-data col-6">${data[i].uname}</div>
                                </div>
                                <div class="row my-3">
                                    <div class="transaction-label col-6">Registered Course: </div>
                                    <div class="transaction-data col-6">${course}</div>
                                </div>
                                <div class="row my-3">
                                    <div class="transaction-label col-6">Transferred Banking : </div>
                                    <div class="transaction-data col-6">${data[i].bank_name}</div>
                                </div>
                                <div class="row my-3">
                                    <div class="transaction-label col-6">Payment Amount : </div>
                                    <div class="transaction-data col-6">${data[i].payment_amount}</div>
                                </div>
                                <div class="row my-3">
                                    <div class="transaction-label col-6">Transferred At : </div>
                                    <div class="transaction-data col-6">${data[i].created_at}</div>
                                </div>
                            </div>
                        </div>
                    `;
          // }
        }
      }
      $(".payment-block").html(renderData);
    }
  )
    .done(function () {
      // console.log("req success");
    })
    .fail(function () {
      // console.log(" req failed");
    });
}

function filterByPaymentPending(e) {
  $("#payment-block").html(``);
  // console.log(e.target.value);
  $.post(
    "filterPayment.php",
    {
      filteredByBanking: e.target.value,
      filteredByTime: $("#filterByTime").val(),
      is_pending: 1,
    },
    function (data) {
      // console.log(data);
      let renderData = ``;
      if (data[0] == null || data.length == 0) {
        renderData = `
                  <div class="col-12 p-2 no-data">
                      There is no data.
                  </div>
                `;
      } else {
        for (var i in data) {
          let course = data[i].level_or_sub
            ? data[i].title + " - " + data[i].level_or_sub
            : data[i].title;
          renderData += `
                        <div class="col-12 col-lg-6 p-2">
                            <div class="card card-block shadow mb-3 px-3 pt-3">
                                <div class="row my-3">
                                    <div class="transaction-label col-6">Transaction ID : </div>
                                    <div class="transaction-data col-6">${data[i].payment_id}</div>
                                </div>
                                <div class="row my-3">
                                    <div class="transaction-label col-6">Registered Student Name : </div>
                                    <div class="transaction-data col-6">${data[i].uname}</div>
                                </div>
                                <div class="row my-3">
                                    <div class="transaction-label col-6">Registered Course: </div>
                                    <div class="transaction-data col-6">${course}</div>
                                </div>
                                <div class="row my-3">
                                    <div class="transaction-label col-6">Transferred Banking : </div>
                                    <div class="transaction-data col-6">${data[i].bank_name}</div>
                                </div>
                                <div class="row my-3">
                                    <div class="transaction-label col-6">Payment Amount : </div>
                                    <div class="transaction-data col-6">${data[i].payment_amount}</div>
                                </div>
                                <div class="row my-3">
                                    <div class="transaction-label col-6">Transferred At : </div>
                                    <div class="transaction-data col-6">${data[i].created_at}</div>
                                </div>
                                <div class="row my-3 justify-content-between px-3">
                                    <button class="my-2 btn btn-info" data-toggle="modal" data-target="#detailViewPayment" onclick="setCurrentDetailPayment(${data[i].payment_id})">Detail<i class="ml-1 fa fa-thumbtack"></i></button>
                                    <button class="my-2 btn btn-danger" data-toggle="modal" data-target="#deleteConfirm" onclick="setCurrentDeletingPayment(${data[i].payment_id})">
                                        Delete <i class="ml-1 fa fa-trash"></i>
                                    </button>
                                    <button class="my-2 btn btn-primary" data-toggle="modal" data-target="#approveConfirm" onclick="setCurrentApproving(${data[i].payment_id})">
                                        Approve <i class="ml-1 fa fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
        }
      }
      $(".payment-block").html(renderData);
    }
  );
}
