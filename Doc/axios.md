## Server side
{ url: 'http://0.0.0.0:8000/recipes.json',
  method: 'get',
  headers:
   { common:
      { Accept: 'application/json, text/plain, */*',
        connection: 'keep-alive',
        'cache-control': 'max-age=0',
        'upgrade-insecure-requests': '1',
        'user-agent':
         'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.97 Safari/537.36',
        'sec-fetch-user': '?1',
        'sec-fetch-site': 'same-origin',
        'sec-fetch-mode': 'navigate',
        referer: 'http://localhost:82/profile/edit',
        'accept-encoding': 'gzip, deflate',
        'accept-language': 'fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7',
        cookie:
         'auth=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NzM1MTAwMTUsImV4cCI6MTU3NjEwMjAxNSwicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoiaGVydmVHdWlnb3oiLCJlbWFpbCI6ImhlcnZlQG1haWwuY29tIiwiYXZhdGFyIjoibW91c3RhY2hlIn0.z6Bn76LdpI5laYiWD_jo8NvqIqMHCMSZT_3zfGcXTRL3pblt_JBVQdKKLnIG2G-vL_weSVN9n58o0KmRgzoPz1LAJlnoU6br5DnBQi_KFi0_ipIhPMi-Jv1aYenhORmWpe04b3lJR8TU95uKn3yma-kZveu0R7D_8PKj-37ln6J2mEg6P4KVb1O3Y--1C9qgxGS__QcWDxTePs_t9cRo5bXSa_EjzSDJYyiGzONLCEdruLJ5s9O1kvFAjEn2tu2oxU_otFE0CCvDVysZa1NYjxTAY2ORXNuIKnG1eocXOS_gZBP1-Ud1YFSWExY1F7kln-nPOaQ01-TqP4AmuXB7vXkVK0zDmKrwC_cM77MUjicz_wPa4t9MX6BwwKbKFaB90pFSpcT7Mtm0nkqmgUO9iIaYylHPMulj2UFCykFqkivgWNGMsuOW4ngsy29CgyXPkCx41acfj2hwBjRSFa4SA0QCUUGRltl93hekWIyWmJe93AsMn54BEsd_vjgdsNCJhIjwOITodSMFyd-vPaQMY8siJ2VS6uTIJRo1DQcfjZvN9cHcfPinX9ijsI9fb-By08Zg8OwxanAP3CW0ZhqFkHEk4yvWnqkhPe9UenXLY1lR4zrgSe5Z7_I5QaSjkzhqQdIc4tSV-VrFP9Lt-ZH_l-jHsPs7j9EAb-6SvGCeGhg',
        'if-none-match': '"ede9e-lRcz9WH5hK/Os8iB+0j0E6PnG90"',
        Authorization:
         'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE1NzM1MTAwMTUsImV4cCI6MTU3NjEwMjAxNSwicm9sZXMiOlsiUk9MRV9VU0VSIl0sInVzZXJuYW1lIjoiaGVydmVHdWlnb3oiLCJlbWFpbCI6ImhlcnZlQG1haWwuY29tIiwiYXZhdGFyIjoibW91c3RhY2hlIn0.z6Bn76LdpI5laYiWD_jo8NvqIqMHCMSZT_3zfGcXTRL3pblt_JBVQdKKLnIG2G-vL_weSVN9n58o0KmRgzoPz1LAJlnoU6br5DnBQi_KFi0_ipIhPMi-Jv1aYenhORmWpe04b3lJR8TU95uKn3yma-kZveu0R7D_8PKj-37ln6J2mEg6P4KVb1O3Y--1C9qgxGS__QcWDxTePs_t9cRo5bXSa_EjzSDJYyiGzONLCEdruLJ5s9O1kvFAjEn2tu2oxU_otFE0CCvDVysZa1NYjxTAY2ORXNuIKnG1eocXOS_gZBP1-Ud1YFSWExY1F7kln-nPOaQ01-TqP4AmuXB7vXkVK0zDmKrwC_cM77MUjicz_wPa4t9MX6BwwKbKFaB90pFSpcT7Mtm0nkqmgUO9iIaYylHPMulj2UFCykFqkivgWNGMsuOW4ngsy29CgyXPkCx41acfj2hwBjRSFa4SA0QCUUGRltl93hekWIyWmJe93AsMn54BEsd_vjgdsNCJhIjwOITodSMFyd-vPaQMY8siJ2VS6uTIJRo1DQcfjZvN9cHcfPinX9ijsI9fb-By08Zg8OwxanAP3CW0ZhqFkHEk4yvWnqkhPe9UenXLY1lR4zrgSe5Z7_I5QaSjkzhqQdIc4tSV-VrFP9Lt-ZH_l-jHsPs7j9EAb-6SvGCeGhg' },
     delete: {},
     get: {},
     head: {},
     post: { 'Content-Type': 'application/x-www-form-urlencoded' },
     put: { 'Content-Type': 'application/x-www-form-urlencoded' },
     patch: { 'Content-Type': 'application/x-www-form-urlencoded' } },
  baseURL: 'http://0.0.0.0:8000',
  transformRequest: [ [Function: transformRequest] ],
  transformResponse: [ [Function: transformResponse] ],
  timeout: 0,
  adapter: [Function: httpAdapter],
  xsrfCookieName: 'XSRF-TOKEN',
  xsrfHeaderName: 'X-XSRF-TOKEN',
  maxContentLength: -1,
  validateStatus: [Function: validateStatus] }
  
  ## Client Side
  
  
