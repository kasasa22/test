<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="Uploads"></x-navbars.sidebar>
          <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Questions and Answers Upload"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <head>
<title>Upload Excel Documents</title>
<style>
  body {
    font-family: Arial, sans-serif;
    padding: 20px;
    
  }
  .upload-form {
    max-width: 1000px;
    margin: 0 auto;
    border: 1px solid #ccc;
    padding: 20px;
    background-color: #f9f9f9;
    text-align:left;
  }
  .upload-form label {
    font-weight: bold;
  }
  .upload-form input[type="file"] {
    margin-top: 5px;
  }
  .upload-form .drop-area {
    border: 2px dashed #ccc;
    padding: 20px;
    margin-top: 20px;
    background-color: #f0f0f0;
    text-align: left;
    cursor: pointer;
  }
  .upload-form .drop-area.highlight {
    border-color: #007bff;
  }
  .upload-form button {
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
  }
  .upload-form button:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>

<div class="upload-form">
  <h2>Upload Questions and Answers</h2>
  <form id="excelUploadForm" enctype="multipart/form-data">
    <p>Upload Questions here</p>
    <div class="drop-area" id="dropArea" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event)">
      <p>Drag and drop questions.xlxs here or click to select</p>
      <input type="file" id="questionsFile" name="questionsFile" accept=".xls,.xlsx" style="display: none;" multiple>
    </div>
    <p>Or</p>
    <div>
      <label for="fileInput">Select Questions File:</label>
      <input type="file" id="fileInput" name="fileInput" accept=".xls,.xlsx" multiple>
    </div>
    <p>Upload Answers here</p>
    <div class="drop-area" id="dropArea" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)" ondrop="handleDrop(event)">
     <p>Drag and drop answers.xlsx here or click to select</p>
      <input type="file" id="answersFile" name="answersFile" accept=".xls,.xlsx" style="display: none;" multiple>
    </div>
    <p>Or</p>
    <div>
      <label for="fileInput">Select Answers File:</label>
      <input type="file" id="fileInput" name="fileInput" accept=".xls,.xlsx" multiple>
    </div>
    <button type="button" onclick="uploadExcel()">Upload Files</button>
  </form>
</div>

<script>
function handleDragOver(event) {
  event.preventDefault();
  event.stopPropagation();
  event.dataTransfer.dropEffect = 'copy';
  document.getElementById('dropArea').classList.add('highlight');
}

function handleDragLeave(event) {
  event.preventDefault();
  event.stopPropagation();
  document.getElementById('dropArea').classList.remove('highlight');
}

function handleDrop(event) {
  event.preventDefault();
  event.stopPropagation();
  document.getElementById('dropArea').classList.remove('highlight');

  var files = event.dataTransfer.files;
  for (var i = 0; i < files.length; i++) {
    var file = files[i];
    if (file.name === 'questions.xls' || file.name === 'answers.xls') {
      if (file.name === 'questions.xls') {
        document.getElementById('questionsFile').files = event.dataTransfer.files;
      } else if (file.name === 'answers.xls') {
        document.getElementById('answersFile').files = event.dataTransfer.files;
      }
    } else {
      alert('Unsupported file: ' + file.name);
    }
  }
}

function uploadExcel() {
  var questionsFile = document.getElementById('questionsFile').files[0];
  var answersFile = document.getElementById('answersFile').files[0];
  var fileInput = document.getElementById('fileInput').files[0];

  // Check if at least one file is selected
  if (!questionsFile && !answersFile && !fileInput) {
    alert("Please select at least one file.");
    return;
  }

  var formData = new FormData();
  if (questionsFile) formData.append('questionsFile', questionsFile);
  if (answersFile) formData.append('answersFile', answersFile);
  if (fileInput) formData.append('fileInput', fileInput);

  // Replace 'upload.php' with your server-side script that handles file upload
  fetch('upload.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.text();
  })
  .then(data => {
    alert('Files uploaded successfully!');
    console.log(data);
  })
  .catch(error => {
    console.error('Error:', error);
    alert('Error uploading files.');
  });
}
</script>

</body>
         <x-footers.auth></x-footers.auth>
         </main>
         <x-plugins></x-plugins>
</x-layout>

