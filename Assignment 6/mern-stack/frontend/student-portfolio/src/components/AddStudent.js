import React, { useState, useEffect } from 'react';
import axios from 'axios';

function AddStudent({ editData, setEditData, refreshList }) {
    const [form, setForm] = useState({ name: '', email: '', course: '', skills: '', github: '' });

    useEffect(() => {
        if (editData) setForm(editData);
        else setForm({ name: '', email: '', course: '', skills: '', github: '' });
    }, [editData]);

    const handleSubmit = (e) => {
        e.preventDefault();
        const url = editData
            ? `http://localhost:3000/student/update/${editData._id}`
            : 'http://localhost:3000/student/add';

        const method = editData ? axios.put : axios.post;

        method(url, form).then(() => {
            alert(editData ? "Record Updated" : "Record Added");
            setEditData(null);
            refreshList();
        }).catch(err => console.log(err));
    };

    return (
        <div className="card">
            <h3>{editData ? "📝 Edit Portfolio" : "🎓 New Portfolio"}</h3>
            <form onSubmit={handleSubmit}>
                <input placeholder="Name" value={form.name} onChange={e => setForm({ ...form, name: e.target.value })} required />
                <input placeholder="Email" value={form.email} onChange={e => setForm({ ...form, email: e.target.value })} required />
                <input placeholder="Course" value={form.course} onChange={e => setForm({ ...form, course: e.target.value })} required />
                <input placeholder="Skills (comma separated)" value={form.skills} onChange={e => setForm({ ...form, skills: e.target.value })} />
                <input placeholder="GitHub URL" value={form.github} onChange={e => setForm({ ...form, github: e.target.value })} />
                <button type="submit" className="btn-primary">{editData ? "Update" : "Save"}</button>
                {editData && <button type="button" onClick={() => setEditData(null)} style={{ width: '100%', marginTop: '5px' }}>Cancel</button>}
            </form>
        </div>
    );
}
export default AddStudent;
