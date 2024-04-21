from flask import Flask, render_template, request

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/recommend', methods=['POST'])
def recommend():
    # Retrieve form data
    personality = request.form['personality']
    body_type = request.form['body_type']
    skin_tone = request.form['skin_tone']

    # Logic to generate recommendation based on inputs
    recommendation = generate_recommendation(personality, body_type, skin_tone)

    # Render recommendation template with generated recommendation
    return render_template('recommendation.html', recommendation=recommendation)

def generate_recommendation(personality, body_type, skin_tone):
    recommendation = {}

    # Outfit recommendations based on personality and body type
    if personality == 'A':
        if body_type == 'Straight':
            recommendation['outfits'] = [
                "\static\images\casual_straight.jpg"
            ]
        elif body_type == 'Hourglass':
            recommendation['outfits'] = [
                "\static\images\casual_hourglass.jpg"
            ]
        elif body_type == 'Pear':
            recommendation['outfits'] = [
                "\static\images\casual_pear.jpg"
            ]


    elif personality == 'B':
        if body_type == 'Straight':
            recommendation['outfits'] = [
                "\static\images\spirited_straight.jpg"
            ]
        elif body_type == 'Hourglass':
            recommendation['outfits'] = [
                "\static\images\spirited_hourglass.jpg"
            ]
        elif body_type == 'Pear':
            recommendation['outfits'] = [
                "\static\images\spirited_pear.jpg"
            ]


    elif personality == 'C':
        if body_type == 'Straight':
            recommendation['outfits'] = [
                "\static\images\bold_straight.jpg"
            ]
        elif body_type == 'Hourglass':
            recommendation['outfits'] = [
                "\static\images\bold_hourglass.jpg"
            ]
        elif body_type == 'Pear':
            recommendation['outfits'] = [
                "\static\images\bold_pear.jpg"
            ]


    elif personality == 'D':
        if body_type == 'Straight':
            recommendation['outfits'] = [
                "\static\images\gentle_straight.jpg"
            ]
        elif body_type == 'Hourglass':
            recommendation['outfits'] = [
                "\static\images\gentle_hourglass.jpg"
            ]
        elif body_type == 'Pear':
            recommendation['outfits'] = [
                "\static\images\gentle_pear.jpg"
            ]


    elif personality == 'E':
        if body_type == 'Straight':
            recommendation['outfits'] = [
                "\static\images\trendy_straight.jpg"
            ]
        elif body_type == 'Hourglass':
            recommendation['outfits'] = [
                "\static\images\trendy_hourglass.jpg"
            ]
        elif body_type == 'Pear':
            recommendation['outfits'] = [
                "\static\images\trendy_pear.jpg"
            ]
    # Add more conditions for other personalities

    # Color palette photo based on skin tone
    if skin_tone == 'Warm':
        recommendation['color_palette'] = "\static\images\warmrecommend.jpg"
    elif skin_tone == 'Cool':
        recommendation['color_palette'] = "\static\images\coolrecommend.jpg"

    return recommendation

if __name__ == '__main__':
    app.run(debug=True)
