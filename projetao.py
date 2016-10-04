from flask import Flask, render_template, request, jsonify

app = Flask(__name__)


@app.route('/')
def cadastro_page():
    return render_template('cadastro-usuario-form.html')


@app.route('/cadastrar/usuario', methods=['POST'])
def cadastrar_usuario():

    if request.method == 'POST':

        nome = request.json['nome']
        sobrenome = request.json['sobrenome']
        email = request.json['email']
        senha = request.json['senha']
        data_nascimento = request.json['data_nascimento']
        sexo = request.json['sexo']
        cidade = request.json['cidade']
        celular = request.json['celular']
        telefone = request.json['telefone']
        facebook = request.json['facebook']
        situacao = request.json['situacao']

        return jsonify({'nome': nome, 'sobrenome': sobrenome, 'email': email, 'senha': senha, 'data_nascimento': data_nascimento,
                        'sexo': sexo, 'cidade': cidade, 'celular': celular, 'telefone': telefone, 'facebook': facebook,
                        'situacao': situacao})


if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0')
