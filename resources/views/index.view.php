<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Note App UI</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function openModal(id) {
      document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id) {
      document.getElementById(id).classList.add('hidden');
    }

    function fillEditForm(title, content) {
      document.getElementById('edit-title').value = title;
      document.getElementById('edit-content').value = content;
      openModal('editModal');
    }

    function confirmDelete() {
      openModal('deleteModal');
    }
  </script>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header class="bg-white shadow-md p-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-blue-600">Hello <?php echo $_SESSION['user']['name'] ?>!</h1>
    <button onclick="openModal('addModal')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
      + New Note
    </button>
     <form action="/logout" method="post">
      <input type="hidden" name="_method" value="DELETE">
          <button type="submit">Logout</button>
      </form>
  </header>

  <!-- Notes Grid -->
  <main class="p-6 grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    <div class="bg-white rounded-xl shadow p-4 relative">
      <h2 class="font-semibold text-lg mb-2">Sample Note</h2>
      <p class="text-sm text-gray-600">This is a sample note content...</p>
      <div class="absolute top-2 right-2 space-x-2 text-sm">
        <button onclick="fillEditForm('Sample Note', 'This is a sample note content...')" class="text-blue-600 hover:underline">Edit</button>
        <button onclick="confirmDelete()" class="text-red-500 hover:underline">Delete</button>
      </div>
    </div>
  </main>

  <!-- Add Modal -->
  <div id="addModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl w-full max-w-md">
      <h2 class="text-xl font-semibold mb-4">Add Note</h2>
      <form>
        <input type="text" placeholder="Title" class="w-full mb-3 p-2 border rounded" required>
        <textarea placeholder="Content" class="w-full mb-3 p-2 border rounded" required></textarea>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('addModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Save</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Edit Modal -->
  <div id="editModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl w-full max-w-md">
      <h2 class="text-xl font-semibold mb-4">Edit Note</h2>
      <form>
        <input type="text" id="edit-title" class="w-full mb-3 p-2 border rounded" required>
        <textarea id="edit-content" class="w-full mb-3 p-2 border rounded" required></textarea>
        <div class="flex justify-end gap-2">
          <button type="button" onclick="closeModal('editModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
          <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Delete Modal -->
  <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl w-full max-w-sm">
      <h2 class="text-xl font-semibold mb-4 text-red-600">Delete Note</h2>
      <p class="mb-4">Are you sure you want to delete this note?</p>
      <div class="flex justify-end gap-2">
        <button type="button" onclick="closeModal('deleteModal')" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
        <button class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
      </div>
    </div>
  </div>

</body>
</html>
