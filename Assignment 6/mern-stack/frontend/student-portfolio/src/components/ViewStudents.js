import React from 'react';
import axios from 'axios';

function ViewStudents({ students, refreshList, onEdit }) {
    const deleteStudent = (id) => {
        if (window.confirm("Delete this record?")) {
            axios.delete(`http://localhost:3000/student/delete/${id}`).then(() => refreshList());
        }
    };

    return (
        <div className="card">
            <h3>📋 Registered Portfolios</h3>
            {students.map(s => (
                <div key={s._id} className="student-item">
                    <div>
                        <strong>{s.name}</strong> <br />
                        <small>{s.course} | {s.skills}</small> <br />
                        <a href={s.github} target="_blank" rel="noreferrer" style={{ fontSize: '10px' }}>GitHub</a>
                    </div>
                    <div>
                        <button className="btn-edit" onClick={() => onEdit(s)}>Edit</button>
                        <button className="btn-delete" onClick={() => deleteStudent(s._id)}>Delete</button>
                    </div>
                </div>
            ))}
        </div>
    );
}
export default ViewStudents;