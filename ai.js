import OpenAI from "openai";
import readline from "readline";

const rl = readline.createInterface({
  input: process.stdin,
  output: process.stdout,
});

const client = new OpenAI({
  apiKey: process.env.OPENAI_API_KEY,
});

function ask() {
  rl.question("> ", async (input) => {
    if (input.trim().toLowerCase() === "exit") {
      rl.close();
      return;
    }

    try {
      const res = await client.responses.create({
        model: "gpt-4.1-mini",
        input,
      });

      console.log("\n" + res.output_text + "\n");
    } catch (e) {
      console.log("\nERROR: " + (e?.message || e) + "\n");
    }

    ask();
  });
}

console.log("OpenAI listo. Escribe algo (exit para salir)\n");
ask();
