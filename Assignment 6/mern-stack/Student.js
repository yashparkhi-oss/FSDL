const mongoose = require('mongoose');

const StudentSchema = new mongoose.Schema({
    name: { type: String, required: true },
    email: { type: String, required: true },
    course: { type: String, required: true },
    skills: { type: String },
    github: { type: String }
});

module.exports = mongoose.model('Student', StudentSchema);