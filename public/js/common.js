function ajaxPromise(url, token, method, payload) {
    return new Promise((resolve, reject) => {
      const headers = token == false ? "" : { Authorization: `Bearer ${token}` };
      $.ajax({
        url: url,
        headers: headers,
        type: method,
        data: payload,
        success: function (data) {
          resolve(data);
        },
        error: function (error) {
          reject(error);
        },
      });
    });
  }
  