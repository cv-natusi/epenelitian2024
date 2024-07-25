<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <style> 
      /* Define the CSS styles here */ 
      *{
        font-family: arial;
      }
      
      header { 
        background-color: #333; 
        color: white; 
        text-align: center; 
        padding: 10px; 
      } 

      footer { 
        background-color: #333; 
        color: white; 
        text-align: justify; 
        padding: 0px; 
        position:fixed;
        bottom :0;
      } 

      content { 
        font-size: 16px; 
        line-height: 0; 
        margin-bottom: 0px; 
      } 

      /* Add the print styles here */ 

      @media print { 

        /* Define the header and footer */ 
        @page { 
          margin-top: 1cm; 
          margin-bottom: 1cm; 
        } 

        header:after { 
          /* content: "Header Text";  */
          display: block; 
          text-align: center; 
        } 

        footer:after { 
          /* content: "Footer Text";  */
          display: block; 
          text-align: center; 
        } 
      } 
    </style> 
  <body>
    <header>
      <table style="border-bottom:2px solid #000000; width:100%">
        <tbody>
          <tr>          
            <td><img src="{{url('/')}}/images/sidoarjo-black-white-seek-logo.png" style="width:120px" /></td>
            <td style="text-align:center">
            <p>PEMERINTAH KABUPATEN SIDOARJO<br />
            <strong>DINAS KESEHATAN</strong><br />
            Jl. Mayjen Sungkono No. 46 Sidoarjo<br />
            Telp. (031) 894 1051, 896 8736 Fax. (031) 894 7911<br />
            Email: dinkes@sidoarjokab.go.id Website: www.dinkes.sidoarjokab.go.id</p>
            </td>
          </tr>
        </tbody>
      </table>
    </header> 
    {!!$data!!}
    <footer>
      <table style="width:100%;">
        <tbody>
          <tr>
            <td style="width:10%"><img src="{{url('/')}}/images/bsre-logo.png" style="height:30px; width:100px" /></td>
            <td style="width:90%;font-size:10px;">Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik yang diterbitkan oleh BSrE Legalitasberkassecara digital diaturoleh Dinas Komunikasi dan Informasi Kabupaten Sidoarjo Untuk mengetahui keabsahan berkas dapat dilakukan dengan memindai qrcode yang tersedia</td>
          </tr>
        </tbody>
      </table>
    </footer> 
  </body>
  <script type="text/javascript">
  window.focus();
  window.print();
  // setTimeout(function () { window.close(); }, 100);
  </script>
</html>
