<!DOCTYPE html>
<html>

<head>
    <title>Order Note Board</title>
    <link rel="stylesheet" href="{{ asset('css/notes.css') }}">
</head>

<body>
    <div class="container">
        <h1>Order Note Board</h1>

        <form id="note-form" class="note-form">
            <div class="form-group">
                <label for="order_number">Order Number</label>
                <input type="text" id="order_number" name="order_number" value="ORD-" required>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" required>
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required></textarea>
            </div>

            <button type="submit">Add Note</button>
        </form>

        <h2>Existing Notes</h2>
        <div id="notes-list"></div>
    </div>

    <script>
        // Loads all the notes from the API
        async function loadNotes() {
            const response = await fetch('/api/notes');
            const notes = await response.json();

            const notesList = document.getElementById('notes-list');
            notesList.innerHTML = '';

            notes.forEach(note => {
                notesList.innerHTML += `
                    <div class="note-card">
                        <div class="note-order">${note.order_number}</div>
                        <div class="note-message">${note.message}</div>
                        <div class="note-meta">
                            ${note.author} • ${new Date(note.created_at).toLocaleString()}
                        </div>
                        <button onclick="deleteNote(${note.id})">Delete</button>
                    </div>
                `;
            });
        }

        // Deletes a note and refreshes the list
        async function deleteNote(id) {
            const response = await fetch(`/api/notes/${id}`, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json'
                }
            });

            if (response.ok) {
                loadNotes();
            } else {
                alert('Failed to delete note');
            }
        }

        // This Submits the form without reloading the page!
        document.getElementById('note-form').addEventListener('submit', async function(e) {
            e.preventDefault();

            const noteData = {
                order_number: document.getElementById('order_number').value,
                author: document.getElementById('author').value,
                message: document.getElementById('message').value
            };

            const response = await fetch('/api/notes', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify(noteData)
            });

            if (response.ok) {
                document.getElementById('note-form').reset();
                loadNotes();
            } else {
                alert('Failed to create note');
            }
        });

        loadNotes();
    </script>
</body>

</html>