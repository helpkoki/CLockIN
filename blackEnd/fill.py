from reportlab.pdfgen import canvas
from PyPDF2 import PdfReader, PdfWriter
import logging

# Configure logging
logging.basicConfig(level=logging.INFO)

def overlay_text(input_pdf, output_pdf, data):
    try:
        # Create a temporary PDF with the text overlay
        temp_pdf = 'temp_overlay.pdf'
        c = canvas.Canvas(temp_pdf)

        # Define positions for each field (x, y coordinates)
        positions = {
            'name': (100, 700),
            'age': (100, 680),
            'class': (100, 660),
            'address': (100, 640),
        }

        # Customize font
        c.setFont("Helvetica", 12)
        c.setFillColorRGB(0, 0, 0)  # Black color

        # Draw the text on the canvas
        for field, value in data.items():
            if field in positions:
                x, y = positions[field]
                c.drawString(x, y, value)
                logging.info(f"Overlaying text: {field} = {value} at position ({x}, {y})")

        c.save()

        # Read the original PDF and the temporary overlay PDF
        original_pdf = PdfReader(input_pdf)
        overlay_pdf = PdfReader(temp_pdf)
        writer = PdfWriter()

        # Merge the overlay with the original PDF
        for page_num in range(len(original_pdf.pages)):
            page = original_pdf.pages[page_num]
            if page_num < len(overlay_pdf.pages):
                overlay_page = overlay_pdf.pages[page_num]
                page.merge_page(overlay_page)
            writer.add_page(page)

        # Write the final PDF to output
        with open(output_pdf, 'wb') as f:
            writer.write(f)
        logging.info(f"PDF form filled successfully and saved as {output_pdf}")
    except Exception as e:
        logging.error(f"An error occurred: {e}")

# Define the form fields and their values
data = {
    'name': 'koketso ma',
    'surname:mopai'
    'age': '15',
    'class': '10th Grade',
    
}

# Fill the PDF form
overlay_text('form.pdf', 'filled_form.pdf', data)
