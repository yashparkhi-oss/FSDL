import React, { useState, useEffect } from 'react';
import axios from 'axios';
import './App.css';
import AddStudent from './components/AddStudent';
import ViewStudents from './components/ViewStudents';

function App() {
  const [students, setStudents] = useState([]);
  const [editData, setEditData] = useState(null);

  const fetchStudents = () => {
    axios.get('http://localhost:3000/student/view')
      .then(res => setStudents(res.data))
      .catch(err => console.log(err));
  };

  useEffect(() => { fetchStudents(); }, []);

  return (
    <div className="app-wrapper">
      <div className="container">
        <h2>Student Portfolio System</h2>
        <AddStudent editData={editData} setEditData={setEditData} refreshList={fetchStudents} />
        <ViewStudents students={students} refreshList={fetchStudents} onEdit={(s) => { setEditData(s); window.scrollTo(0, 0); }} />
      </div>
    </div>
  );
}
export default App;