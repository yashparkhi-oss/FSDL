const express = require('express');
const router = express.Router();
const Student = require('../models/Student');

// Create
router.post('/add', async (req, res) => {
    try {
        const student = new Student(req.body);
        await student.save();
        res.status(201).json({ message: 'Student Added' });
    } catch (err) {
        res.status(400).send(err.message);
    }
});

// Read
router.get('/view', async (req, res) => {
    const students = await Student.find();
    res.json(students);
});

// Update
router.put('/update/:id', async (req, res) => {
    try {
        await Student.findByIdAndUpdate(req.params.id, req.body);
        res.send('Student Updated');
    } catch (err) {
        res.status(400).send(err.message);
    }
});

// Delete
router.delete('/delete/:id', async (req, res) => {
    await Student.findByIdAndDelete(req.params.id);
    res.send('Student Deleted');
});

module.exports = router;