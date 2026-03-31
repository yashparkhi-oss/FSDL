import Header from './components/Header';
import About from './components/About';
import Education from './components/Education';
import Skills from './components/Skills';
import Projects from './components/Projects';
import Interests from './components/Interests';
import Footer from './components/Footer';
import './App.css';

function App() {
  return (
    <div>
      <Header />
      <main>
        <About />
        <Education />
        <Skills />
        <Projects />
        <Interests />
      </main>
      <Footer />
    </div>
  );
}

export default App;